<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      return view('employee.index');
    }

    public function edit(Request $request, $id)
    {
      $employee  = User::where('id',$id)->first();

      return view('employee.edit', compact('employee'));
    }

    public function create()
    {
      $employee  = null;
      return view('employee.create', compact('employee'));

    }


    public function show()
    {
      return view('employee.index');
    }


    public function store(Request $request)
    {

      $validator = Validator::make($request->all(), [
        'name'                  => 'required|string',
        'email'                 => 'required|email|unique:users',
        'password'              => 'required|min:6',
      ]);

      if ($validator->fails()) {
          return redirect('empleados/create')
                      ->withErrors($validator);
      }
      $input   = $request->all();

      $input{'password'} = bcrypt($request{'password'});
      $user = User::create($input);
      return redirect(route('empleados.index'));


    }


    public function update(Request $request, $id)
    {

      $validator = Validator::make($request->all(), [
        'name'                  => 'required|string',
        'email'                 => 'required|email|unique:users,email,'.$id.'',
        'password'              => 'required|min:6',
    ]);
      if ($validator->fails()) {
          return redirect('empleados/edit')
                      ->withErrors($validator);
      }
      $this->updateData($id, $request->all() );

      return redirect(route('empleados.index'));
    }


    public function getList(Request $request)
    {
      $formulario = request()->formulario;
      $data       = (new User)->newQuery();
      $data       = $data->get();

      return response()->json([
        'data' => $data,
      ]);
    }

    public function status(Request $request)
    {
      $id                = request()->id;
      $data              = User::find('id',$id);
      $data->deleted_at  = $data->deleted_at ?  null  : Carbon::now() ;
      $data->update();

      return response()->json([
        'object' => 'success',
      ]);
    }

    protected function updateData($id, $request){
        $data             = User::find($id);

        $data->name              = (isset($request{'name'}))        ? $request{'name'}             : $data->name;
        $data->email             = (isset($request{'email'}))       ? $request{'email'}            : $data->email;
        $data->password          = (isset($request{'password'}))    ? bcrypt($request{'password'}) : $data->password;
        $data->email_verified_at = Carbon::now();
        $data->updated_at = Carbon::now();
        $data->update();
    }
}

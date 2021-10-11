<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      return view('clients.index');
    }

    public function edit(Request $request, $id)
    {
      $clients  = Client::withTrashed()->with('getUser')->where('id',$id)->first();

      return view('clients.edit', compact('clients'));
    }

    public function create()
    {
      $clients  = null;
      return view('clients.create', compact('clients'));

    }


    public function show()
    {
      return view('clients.index');
    }


    public function store(Request $request)
    {

      $validator = Validator::make($request->all(), [
          'name'                  => 'required|string',
          'lastname'              => 'required|string',
          'email'                 => 'required|email|unique:clients',
          'phone'                 => 'required|min:10|unique:clients',
          'year_birth'            => 'digits:4|integer|min:1900|max:'.(date('Y')+1),
      ]);

      if ($validator->fails()) {
          return redirect('clientes/create')
                      ->withErrors($validator);
      }
      $input   = $request->all();
      $input{'user_id'} = Auth::user()->id;
      $data = Client::create($input);
      return redirect(route('clientes.index'));


    }


    public function update(Request $request, $id)
    {

      $validator = Validator::make($request->all(), [
          'name'                  => 'required|string',
          'lastname'              => 'required|string',
          'email'                 => 'required|email|unique:clients,email,'.$id.'',
          'phone'                 => 'required|min:10|unique:clients,phone,'.$id.'',
          'year_birth'            => 'digits:4|integer|min:1900|max:'.(date('Y')+1),
      ]);
      if ($validator->fails()) {
          return redirect('clientes/edit')
                      ->withErrors($validator);
      }
      $this->updateData($id, $request->all() );

      return redirect(route('clientes.index'));
    }


    public function getList(Request $request)
    {
      $formulario = request()->formulario;
      $data       = (new Client)->newQuery();
      $data       = $data->withTrashed()->with('getUser')->get();

      return response()->json([
        'data' => $data,
      ]);
    }

    public function status(Request $request)
    {
      $id                = request()->id;
      $data              = Client::withTrashed()->with('getUser')->where('id',$id)->first();
      $data->deleted_at  = $data->deleted_at ?  null  : Carbon::now() ;
      $data->update();

      return response()->json([
        'object' => 'success',
      ]);
    }

    protected function updateData($id, $request){
        $data             = Client::withTrashed()->with('getUser')->where('id', $id)->first();
        $data->name       = (isset($request{'name'}))        ? $request{'name'}       : $data->name;
        $data->lastname   = (isset($request{'lastname'}))    ? $request{'lastname'}   : $data->lastname;
        $data->year_birth = (isset($request{'year_birth'}))  ? $request{'year_birth'} : $data->year_birth;
        $data->year_died  = (isset($request{'year_died'}))   ? $request{'year_died'}  : null;
        $data->phone      = (isset($request{'phone'}))       ? $request{'phone'}      : $data->phone;
        $data->address    = (isset($request{'address'}))     ? $request{'address'}    : $data->address;
        $data->email      = (isset($request{'email'}))       ? $request{'email'}      : $data->email;
        $data->updated_at = Carbon::now();
        $data->user_id    = Auth::user()->id;
        $data->update();
    }
}

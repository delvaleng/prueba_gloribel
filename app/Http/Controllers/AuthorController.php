<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      return view('author.index');
    }

    public function edit(Request $request, $id)
    {
      $author  = Authors::withTrashed()->with('getUser')->where('id',$id)->first();

      return view('author.edit', compact('author'));
    }

    public function create()
    {
      $author  = null;
      return view('author.create', compact('author'));

    }


    public function show()
    {
      return view('author.index');
    }


    public function store(Request $request)
    {

      $validator = Validator::make($request->all(), [
          'name'                  => 'required|string',
          'lastname'              => 'required|string',
          'year_birth'            => 'digits:4|integer|min:1900|max:'.(date('Y')+1),
      ]);

      if ($validator->fails()) {
          return redirect('autores/create')
                      ->withErrors($validator);
      }
      $input   = $request->all();
      $input{'user_id'} = Auth::user()->id;
      $data = Authors::create($input);
      return redirect(route('autores.index'));


    }


    public function update(Request $request, $id)
    {

      $validator = Validator::make($request->all(), [
          'name'                  => 'required|string',
          'lastname'              => 'required|string',
          'year_birth'            => 'digits:4|integer|min:1900|max:'.(date('Y')+1),
      ]);
      if ($validator->fails()) {
          return redirect('autores/edit')
                      ->withErrors($validator);
      }
      $this->updateData($id, $request->all() );

      return redirect(route('autores.index'));
    }


    public function getList(Request $request)
    {
      $formulario = request()->formulario;
      $data       = (new Authors)->newQuery();
      $data       = $data->with('getUser')->withTrashed()->get();

      return response()->json([
        'data' => $data,
      ]);
    }

    public function status(Request $request)
    {
      $id                = request()->id;
      $data              = Authors::withTrashed()->with('getUser')->where('id',$id)->first();
      $data->deleted_at  = $data->deleted_at ?  null  : Carbon::now() ;
      $data->update();

      return response()->json([
        'object' => 'success',
      ]);
    }

    protected function updateData($id, $request){
        $data             = Authors::withTrashed()->with('getUser')->where('id', $id)->first();

        $data->name       = (isset($request{'name'}))        ? $request{'name'}       : $data->name;
        $data->lastname   = (isset($request{'lastname'}))    ? $request{'lastname'}   : $data->lastname;
        $data->year_birth = (isset($request{'year_birth'}))  ? $request{'year_birth'} : $data->year_birth;
        $data->year_died  = (isset($request{'year_died'}))   ? $request{'year_died'}  : null;
        $data->updated_at = Carbon::now();
        $data->user_id    = Auth::user()->id;

        $data->update();
    }
}

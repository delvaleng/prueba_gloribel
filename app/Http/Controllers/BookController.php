<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Authors;
use App\Models\BookAuhtor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      return view('books.index');
    }

    public function edit(Request $request, $id)
    {
      $books  = Book::withTrashed()->with('getUser')->where('id',$id)->first();
      $author = Authors::all(['id', 'name']);

      return view('books.edit', compact('books', 'author'));
    }

    public function create()
    {
      $books  = null;
      $author = Authors::all(['id', 'name']);

      return view('books.create', compact('books', 'author'));

    }


    public function show()
    {
      return view('books.index');
    }


    public function store(Request $request)
    {

      $validator = Validator::make($request->all(), [
          'title'         => 'required|string',
          'editor'        => 'required|string',
          'date_publish'  => 'date',
          'price_min'     => 'required',
          'price'         => 'required',
          'average'       => 'required'
      ]);

      if ($validator->fails()) {
          return redirect('libros/create')
                      ->withErrors($validator);
      }
      $input   = $request->all();
      $input{'user_id'} = Auth::user()->id;
      $id = Book::create($input)->id;

      foreach ($request{'author_id'} as $key) {
        $book_author             = new BookAuhtor();
        $book_author->author_id  = $key;
        $book_author->book_id    = $id;
        $book_author->user_id    = Auth::user()->id;
        $book_author->save();

      }
      return redirect(route('libros.index'));


    }


    public function update(Request $request, $id)
    {

      $validator = Validator::make($request->all(), [
        'title'         => 'required|string',
        'editor'        => 'required|string',
        'date_publish'  => 'date',
        'price_min'     => 'required',
        'price'         => 'required',
        'average'       => 'required'
      ]);
      if ($validator->fails()) {
          return redirect('libros/edit')
                      ->withErrors($validator);
      }
      $this->updateData($id, $request->all() );

      return redirect(route('libros.index'));
    }


    public function getList(Request $request)
    {
      $formulario = request()->formulario;
      $data       = (new Book)->newQuery();
      $data       = $data->with('getUser', 'authors')->withTrashed()->get();

      return response()->json([
        'data' => $data,
      ]);
    }

    public function status(Request $request)
    {
      $id                = request()->id;
      $data              = Book::withTrashed()->with('getUser','authors')->where('id',$id)->first();
      $data->deleted_at  = $data->deleted_at ?  null  : Carbon::now() ;
      $data->update();

      return response()->json([
        'object' => 'success',
      ]);
    }


    public function getAuthor(Request $request)
    {
      $id     = request()->id;
      $data   = BookAuhtor::with('getAuthor')->where('book_id',$id)->get();
      return response()->json([
        'data' => $data,
      ]);
    }

    protected function updateData($id, $request){

        $data                 = Book::withTrashed()->with('getUser')->where('id', $id)->first();
        $data->title          = (isset($request{'title'}))        ? $request{'title'}       : $data->title;
        $data->editor         = (isset($request{'editor'}))    ? $request{'editor'}   : $data->editor;
        $data->date_publish   = (isset($request{'date_publish'}))    ? $request{'date_publish'}   : $data->date_publish;
        $data->price_min      = (isset($request{'price_min'}))    ? $request{'price_min'}   : $data->price_min;
        $data->price          = (isset($request{'price'}))  ? $request{'price'} : $data->price;
        $data->description    = (isset($request{'description'}))  ? $request{'description'} : $data->description;
        $data->average        = (isset($request{'average'}))   ? $request{'average'}  :  $data->average;
        $data->updated_at     = Carbon::now();
        $data->user_id        = Auth::user()->id;
        $data->update();

        BookAuhtor::where('book_id',$id)->delete();

        foreach ($request{'author_id'} as $key) {
          $book_author             = new BookAuhtor();
          $book_author->author_id  = $key;
          $book_author->book_id    = $id;
          $book_author->user_id    = Auth::user()->id;
          $book_author->save();

        }

    }
}

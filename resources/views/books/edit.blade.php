@extends('layouts.app')
@section('title', 'Libross')

@section('css')
<link rel="stylesheet" href="{{ asset('css/inputs_sin_icon.css')}}">
<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@endsection

@section('content')

<div class="container-fluid ma-10">
  <div class="pa-10 ma -10">
    <div class="card">
    <div class="card-header">
      Editar Libros
      <a class="btn float-right btn-primary" href="{!! route('libros.index') !!}">Listado</a>
    </div>

    <div class="card-body">
      <form method="POST" action="{{url('libros',['id' => $books->id])}}" id="formClients">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        @include('books.fields')
      </form>
    </div>
  </div>
  </div>
@endsection
</div>
@section('scripts')
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script src="{{ asset('js/books/create.js')}} "></script>
@endsection

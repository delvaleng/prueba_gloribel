@extends('layouts.app')
@section('title', 'Libross')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

@section('content')
<div class="container-fluid ma-10">
  <div class="pa-10 ma -10">
    <div class="card">
    <div class="card-header">
      Agregar Libros
      <a class="btn float-right btn-primary" href="{!! route('libros.index') !!}">Listado</a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('libros.store') }}" id="formClients">
          @csrf
          @include('books.fields')

        </form>
    </div>
  </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="{{ asset('js/books/create.js')}} "></script>
@endsection

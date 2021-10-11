@extends('layouts.app')
@section('title', 'Autores')

@section('css')
@endsection

@section('content')
<div class="container-fluid ma-10">
  <div class="pa-10 ma -10">
    <div class="card">
    <div class="card-header">
      Listado de Autores
      <a class="btn float-right btn-primary" href="{!! route('autores.create') !!}">Agregar Autor</a>
    </div>

    <div class="card-body">
      @include('author.table')
    </div>
  </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/author/index.js')}} "></script>
@endsection

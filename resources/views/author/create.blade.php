@extends('layouts.app')
@section('title', 'Autores')

@section('css')

@endsection

@section('content')
<div class="container-fluid ma-10">
  <div class="pa-10 ma -10">
    <div class="card">
    <div class="card-header">
      Agregar Autor
      <a class="btn float-right btn-primary" href="{!! route('autores.index') !!}">Listado</a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('autores.store') }}" id="formClients">
          @csrf
          @include('author.fields')
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

<script src="{{ asset('js/author/create.js')}} "></script>
@endsection

@extends('layouts.app')
@section('title', 'Clientes')

@section('css')
@endsection

@section('content')
<div class="container-fluid ma-10">
  <div class="pa-10 ma -10">
    <div class="card">
    <div class="card-header">
      Listado de Clientes
      <a class="btn float-right btn-primary" href="{!! route('clientes.create') !!}">Agregar Cliente</a>
    </div>

    <div class="card-body">
      @include('clients.table')
    </div>
  </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/clients/index.js')}} "></script>
@endsection

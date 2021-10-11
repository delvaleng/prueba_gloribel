@extends('layouts.app')
@section('title', 'Clientes')

@section('css')
<link rel="stylesheet" href="{{ asset('css/inputs_sin_icon.css')}}">
<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@endsection

@section('content')
<div class="container-fluid ma-10">
  <div class="pa-10 ma -10">
    <div class="card">
    <div class="card-header">
      Agregar Cliente
      <a class="btn float-right btn-primary" href="{!! route('clientes.index') !!}">Listado</a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('clientes.store') }}" id="formClients">
          @include('clients.fields')
        </form>
    </div>
  </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/clients/create.js')}} "></script>
@endsection

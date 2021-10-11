@extends('layouts.app')
@section('title', 'Empleados')

@section('css')
@endsection

@section('content')
<div class="container-fluid ma-10">
  <div class="pa-10 ma -10">
    <div class="card">
    <div class="card-header">
      Listado de Empleados
      <a class="btn float-right btn-primary" href="{!! route('empleados.create') !!}">Agregar Empleado</a>
    </div>

    <div class="card-body">
      @include('employee.table')
    </div>
  </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/employee/index.js')}} "></script>
@endsection

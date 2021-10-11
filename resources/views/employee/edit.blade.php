@extends('layouts.app')
@section('title', 'Empleados')

@section('css')
<link rel="stylesheet" href="{{ asset('css/inputs_sin_icon.css')}}">
<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@endsection

@section('content')

<div class="container-fluid ma-10">
  <div class="pa-10 ma -10">
    <div class="card">
    <div class="card-header">
      Editar Empleado
      <a class="btn float-right btn-primary" href="{!! route('empleados.index') !!}">Listado</a>
    </div>

    <div class="card-body">
      <form method="POST" action="{{url('empleados',['id' => $employee->id])}}" id="formClients">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        @include('employee.fields')
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

<script src="{{ asset('js/employee/create.js')}} "></script>
@endsection

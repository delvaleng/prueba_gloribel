@extends('layouts.app')
@section('title', 'Empleados')

@section('css')

@endsection

@section('content')
<div class="container-fluid ma-10">
  <div class="pa-10 ma -10">
    <div class="card">
    <div class="card-header">
      Agregar Empleado
      <a class="btn float-right btn-primary" href="{!! route('empleados.index') !!}">Listado</a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('empleados.store') }}" id="formClients">
          @csrf
          @include('employee.fields')

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

<script src="{{ asset('js/employee/create.js')}} "></script>
@endsection

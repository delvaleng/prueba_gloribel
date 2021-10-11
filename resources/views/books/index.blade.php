@extends('layouts.app')
@section('title', 'Libross')

@section('css')
@endsection

@section('content')
<div class="container-fluid ma-10">
  <div class="pa-10 ma -10">
    <div class="card">
    <div class="card-header">
      Listado de Libross
      <a class="btn float-right btn-primary" href="{!! route('libros.create') !!}">Agregar Libros</a>
    </div>

    <div class="card-body">
      @include('books.table')
    </div>
  </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">¿Desea Salir de la sesión?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Seleccione "Salir" para salir de la oficina virtual.</div>
      <div class="modal-footer">
        <button class="btn btn-default" type="button" data-dismiss="modal">{{ __('Regresar') }}</button>
        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </div>
  </div>
</div><!-- END Logout Modal-->
@endsection

@section('scripts')
<script src="{{ asset('js/books/index.js')}} "></script>
@endsection

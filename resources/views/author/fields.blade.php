<!-- Informacion personal -->
<div class="row">
@if ($errors->any())
     <div class="alert alert-warning" role="alert">
        @foreach ($errors->all() as $error)
           <div>{{ $error }}</div>
       @endforeach
     </div>
 @endif
</br>

<div class="form-group col-sm-6">
  <label for="lastname" >Nombres</label>
  <div class="input-group col-xs-12">
    <input id="name" type="text" class="form-control" name="name" value="{{ $author ? $author->name : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>

<div class="form-group col-sm-6">
  <label for="lastname" >Apellidos</label>
  <div class="input-group col-xs-12">
    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $author ? $author->lastname : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>


<div class="form-group col-sm-6">
  <label for="year_birth" >Año|Nacimiento</label>
  <div class="input-group col-xs-12">
    <input id="year_birth" type="number" min="1900" max="2099" class="form-control" name="year_birth" value="{{ $author ? $author->year_birth : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>

<div class="form-group col-sm-6">
  <label for="year_died" >Año|Muerte</label>
  <div class="input-group col-xs-12">
    <input id="year_died" type="text" class="form-control" name="year_died" value="{{ $author ? $author->year_died : null }}"  autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>
</div>


<div class="row">
  <div class="form-group col-sm-6">
    <a href="{{ route('autores.index') }}" class="btn btn-block btn-default">Cancelar</a>
  </div>

  <div class="form-group col-sm-6">
    <button type="submit" class="btn btn-block btn-success"> Enviar </button>
  </div>
</div>

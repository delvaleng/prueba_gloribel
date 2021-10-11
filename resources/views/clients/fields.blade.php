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
    <input id="name" type="text" class="form-control" name="name" value="{{ $clients ? $clients->name : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>

<div class="form-group col-sm-6">
  <label for="lastname" >Apellidos</label>
  <div class="input-group col-xs-12">
    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $clients ? $clients->lastname : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>

<div class="form-group col-sm-6">
  <label for="phone">Teléfono</label>
  <div class="input-group col-xs-12">
    <input id="phone" type="text" class="form-control" name="phone" value="{{ $clients ? $clients->phone : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>

<div class="form-group col-sm-6">
  <label for="phone">Correo Electrónico</label>
  <div class="input-group col-xs-12">
    <input id="email" type="email" class="form-control" name="email" value="{{ $clients ? $clients->email : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>

<div class="form-group col-sm-12">
  <label for="phone">Dirección</label>
  <div class="input-group col-xs-12">
    <textarea  id="address" cols="4"  class="form-control" name="address" value="{{ $clients ? $clients->address : null }}"  autofocus></textarea>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>


<div class="form-group col-sm-6">
  <label for="year_birth" >Año|Nacimiento</label>
  <div class="input-group col-xs-12">
    <input id="year_birth" type="number" min="1900" max="2099" class="form-control" name="year_birth" value="{{ $clients ? $clients->year_birth : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>

<div class="form-group col-sm-6">
  <label for="year_died" >Año|Muerte</label>
  <div class="input-group col-xs-12">
    <input id="year_died" type="text" class="form-control" name="year_died" value="{{ $clients ? $clients->year_died : null }}"  autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>
</div>


<div class="row">
  <div class="form-group col-sm-6">
    <a href="{{ route('clientes.index') }}" class="btn btn-block btn-default">Cancelar</a>
  </div>

  <div class="form-group col-sm-6">
    <button type="submit" class="btn btn-block btn-success"> Enviar </button>
  </div>
</div>

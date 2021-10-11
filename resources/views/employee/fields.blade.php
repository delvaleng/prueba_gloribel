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
    <input id="name" type="text" class="form-control" name="name" value="{{ $employee ? $employee->name : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>


<div class="form-group col-sm-6">
  <label for="phone">Correo Electrónico</label>
  <div class="input-group col-xs-12">
    <input id="email" type="email" class="form-control" name="email" value="{{ $employee ? $employee->email : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>
<div class="form-group col-sm-6">
</div>

<div class="form-group col-sm-6">
  <label for="phone">Contraseña</label>
  <div class="input-group col-xs-12">
    <input id="password" type="password" class="form-control" name="password" value=" " required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>
</div>


<div class="row">
  <div class="form-group col-sm-6">
    <a href="{{ route('empleados.index') }}" class="btn btn-block btn-default">Cancelar</a>
  </div>

  <div class="form-group col-sm-6">
    <button type="submit" class="btn btn-block btn-success"> Enviar </button>
  </div>
</div>

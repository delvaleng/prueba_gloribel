<div class="form-group col-sm-6">
  <label for="name" >Nombres</label>
  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
  @error('name')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group col-sm-6">
  <label for="lastname" >Apellidos</label>
  <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autofocus>
  @error('lastname')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group col-sm-6">
  <label for="phone">Teléfono</label>
  <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autofocus>
  @error('phone')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group col-sm-6">
  <label for="email" >{{ __('E-Mail Address') }}</label>

  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
  @error('email')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>


<div class="form-group col-sm-12">
  <label for="address" >Dirección</label>

  <textarea  id="address" cols="4"  class="form-control @error('email') is-invalid @enderror" name="address" value="{{ old('address') }}" required autofocus></textarea>
  @error('address')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group col-sm-6">
  <label for="year_birth" >Año|Nacimiento</label>
  <input id="year_birth" type="number" min="1900" max="2099" class="form-control @error('year_birth') is-invalid @enderror" name="year_birth" value="{{ old('year_birth') }}" required autofocus>
  @error('year_birth')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group col-sm-6">
  <label for="year_died" >Año|Muerte</label>
  <input id="year_died" type="text" class="form-control @error('year_died') is-invalid @enderror" name="year_died" value="{{ old('year_died') }}" required  autofocus>
  @error('year_died')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>


<div class="form-group col-sm-6">
  <a href="{{ route('clientes.index') }}" class="btn btn-block btn-default">Cancelar</a>
</div>

<div class="form-group col-sm-6">
  <button type="submit" class="btn btn-block btn-primary"> Guardar </button>
</div>

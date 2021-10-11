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
    <label for="lastname" >Autor(es)</label>
    <div class="input-group col-xs-12">
      <select class="form-control" name="author_id[]" id="author_id[]"  multiple >
          @foreach($author as $item)
           <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach
        </select>
    </div>
    <div><span class="help-block" id="error"></span></div>
</div>

<div class="form-group col-sm-6">
  <div class="form-group col-sm-12">
    <label for="title" >Titulo</label>
    <div class="input-group col-xs-12">
      <input id="title" type="text" class="form-control" name="title" value="{{ $books ? $books->title : null }}" required autofocus>
    </div>
    <div><span class="help-block" id="error"></span></div>
  </div>

  <div class="form-group col-sm-12">
    <label for="editor">Editor</label>
    <div class="input-group col-xs-12">
      <input id="editor" type="text" class="form-control" name="editor" value="{{ $books ? $books->editor : null }}" required autofocus>
    </div>
    <div><span class="help-block" id="error"></span></div>
  </div>
</div>


<div class="form-group col-sm-6">
  <label for="date_publish">Fecha de Publicación</label>
  <div class="input-group col-xs-12">
    <input id="date_publish" type="date" class="form-control" name="date_publish" value="{{ $books ? $books->date_publish : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>
<div class="form-group col-sm-6">
  <label for="average">Valoración</label>
  <div class="input-group col-xs-12">
    <select  class="form-control" name="average" id="average">
      <option value="EXTRAORDINARIO">EXTRAORDINARIO</option>
      <option value="EXCELENTE">EXCELENTE</option>
      <option value="BUENO">BUENO</option>
      <option value="DAÑADO">DAÑADO</option>
    </select>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>

<div class="form-group col-sm-12">
  <label for="phone">Descripción</label>
  <div class="input-group col-xs-12">
    <textarea  id="description" cols="4"  class="form-control" name="description" value="{{ $books ? $books->description : null }}"  autofocus></textarea>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>


<div class="form-group col-sm-6">
  <label for="price_min">Precio Min</label>
  <div class="input-group col-xs-12">
    <input id="price_min" type="text" class="form-control" name="price_min" value="{{ $books ? $books->price_min : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>

<div class="form-group col-sm-6">
  <label for="price">Precio</label>
  <div class="input-group col-xs-12">
    <input id="price" type="text" class="form-control" name="price" value="{{ $books ? $books->price : null }}" required autofocus>
  </div>
  <div><span class="help-block" id="error"></span></div>
</div>
</div>


<div class="row">
  <div class="form-group col-sm-6">
    <a href="{{ route('libros.index') }}" class="btn btn-block btn-default">Cancelar</a>
  </div>

  <div class="form-group col-sm-6">
    <button type="submit" class="btn btn-block btn-success"> Enviar </button>
  </div>
</div>

@extends('layout.app')

@section('title', 'Create')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
</div>
@endif
<form method="POST" action="/movie" class="form-group" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" class="form-control">
        <label for="estreno">Año de Estreno</label>
        <input type="number" name="estreno" class="form-control">
        <label for="duracion">Duración</label>
        <input type="number" name="duracion" class="form-control">
        <label for="stock">Stock</label>
        <input type="number" name="stock" class="form-control">
        <label for="id_category">Categoría Seleccionar</label>
        <select id="id_category" name="id_category" class="form-control">
        @foreach( $type as $key => $value )
            <option value="{{ $value }}">{{ $key }}</option>
        @endforeach
        </select>
    </div><br>
    <div class="form-group">
        <label for="img">Seleccione Archivo de Portada</label>
        <input type="file" name="img">
    </div>
    <button class="btn btn-primary">Guardar</button>
</form>
@endsection
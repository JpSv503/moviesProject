@extends('layout.app')

@section('title', 'Edit')

@section('content')

@if ($errors->any())
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
@endif

<form method="POST" action="/movie/{{$movie->id}}" class="form-group" enctype="multipart/form-data">
@method('PUT')
@csrf
    <div class="form-group">
    <label for="titulo">Título</label>
        <input type="text" value="{{$movie->titulo}}" name="titulo" class="form-control">
        <label for="estreno">Año de Estreno</label>
        <input type="number" value="{{$movie->estreno}}" name="estreno" class="form-control">
        <label for="duracion">Duración</label>
        <input type="number" value="{{$movie->duracion}}" name="duracion" class="form-control">
        <label for="stock">Stock</label>
        <input type="number" value="{{$movie->stock}}" name="stock" class="form-control">
        <label for="id_category">Categoría Seleccionar</label>
        <select id="id_category" name="id_category" class="form-control">
        @foreach( $type as $key => $value )
            <option value="{{ $value }}">{{ $key }}</option>
        @endforeach
        </select>
    </div><br>
    <div class="form-group">
        <label for="fotografia">Seleccione Archivo</label>
        <input type="file" value="{{$movie->fotografia}}" name="fotografia">
    </div>
    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
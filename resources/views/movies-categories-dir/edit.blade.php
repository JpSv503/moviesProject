@extends('layout.app')

@section('title', 'Edit')

@section('content')

@if ($errors->any())
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
@endif

<form method="POST" action="/category/{{$category->id}}" class="form-group" enctype="multipart/form-data">
@method('PUT')
@csrf
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" value="{{$category->nombre}}" name="nombre" class="form-control">
        <label for="descripcion">Descripcion</label>
        <input type="text" value="{{$category->descripcion}}"name="descripcion" class="form-control">
    </div>
    <div class="form-group">
        <label for="fotografia">Seleccione Archivo</label>
        <input type="file" value="{{$category->fotografia}}" name="fotografia">
    </div>
    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
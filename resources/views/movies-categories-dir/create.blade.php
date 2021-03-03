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
<form method="POST" action="/category" class="form-group" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <label for="nombrename">Nombre</label>
        <input type="text" name="nombrename" class="form-control">
        <label for="descripcionname">Descripcion</label>
        <input type="text" name="descripcionname" class="form-control">
    </div>
    <div class="form-group">
        <label for="imgname">Seleccione Archivo</label>
        <input type="file" name="imgname">
    </div>
    <button class="btn btn-primary">Guardar</button>
</form>
@endsection
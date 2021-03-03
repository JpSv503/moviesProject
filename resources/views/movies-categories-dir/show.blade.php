@extends('layout.app')

@section('title', 'Inicio')

@section('content')
<div class="text-center">
    <img style="height: 200px; width: 200px;" src="/imgCategories/{{$category->fotografia}}" class="card-img" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$category->nombre}}</h5>
        <p class="card-text">{{$category->descripcion}}</p>
        <a href="/movie" class="btn btn-primary">Ver todas las Películas</a>
        <a href="/category/{{$category->id}}/edit" class="btn btn-success">Modificar Categoría</a>

        <form method="POST" action="/category/{{$category->id}}" class="form-group" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
            <button class="btn btn-danger">Eliminar</button>
        </form>
    </div>
</div>
@endsection
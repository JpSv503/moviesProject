@extends('layout.app')

@section('title', 'Detalle')

@section('content')
<div class="text-center">
    <img style="height: 200px; width: 200px;" src="/imgPelicula/{{$movie->fotografia}}" class="card-img" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$movie->titulo}}</h5>
        <p class="card-text">{{$movie->estreno}}</p>
        <p class="card-text">{{$movie->duracion}} Minutos</p>
        <a href="/movie" class="btn btn-primary">Ver todas las peliculas</a>
        <a href="/movie/{{$movie->id}}/edit" class="btn btn-success">Modificar Película</a>

        <form method="POST" action="/movie/{{$movie->id}}" class="form-group" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
            <button class="btn btn-danger">Eliminar</button>
        </form>
        <a href="/alquiler/{{$movie->id}}" class="btn btn-success">Alquilar Película</a>
        <a href="/compra/{{$movie->id}}" class="btn btn-success">Comprar Película</a>
    </div>
</div>
@endsection
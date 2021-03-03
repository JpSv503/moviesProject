@extends('layout.app')

@section('title', 'Inicio')

@section('content')
<section>
    <a href="/movie/create" class="btn btn-primary">Crear Nueva Película</a>
</section><br>
<div class="row">
    @foreach($movies as $movie)
    <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="/imgPelicula/{{$movie->fotografia}}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$movie->titulo}}</h5>
                    <p class="card-text">{{$movie->estreno}}</p>
                    <span>{{$movie->category_id}}</span>
                    <p class="card-text"></p>
                    <a href="/movie/{{$movie->id}}" class="btn btn-primary">Ver más</a>
                    <p class="card-text"><small class="text-muted">Última Actualización {{$movie->updated_at}}</small></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
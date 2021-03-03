@extends('layout.app')

@section('title', 'Inicio')

@section('content')
<section>
    <a href="/category/create" class="btn btn-primary">Crear Nueva Categoría</a>
</section><br>
<div class="row">
    @foreach($categories as $category)
    <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="/imgCategories/{{$category->fotografia}}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$category->nombre}}</h5>
                    <p class="card-text">{{$category->descripcion}}</p>
                    <a href="/category/{{$category->id}}" class="btn btn-primary">Ver más</a>
                    <p class="card-text"><small class="text-muted">Última Actualización {{$category->updated_at}}</small></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
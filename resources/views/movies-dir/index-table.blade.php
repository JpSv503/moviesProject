@extends('layout.app')

@section('title', 'Inicio')

@section('content')
<br>
<div class="row">
    @foreach($movies as $movie)
        <table id="tableMovie" class="table table-striped table-bordered"
        style="width:100%">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Estreno</th>
                    <th>Duracion(Minutos)</th>
                    <th>Categoria</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$movie->titulo}}</td>
                    <td>{{$movie->estreno}}</td>
                    <td>{{$movie->duracion}}</td>
                    <td>{{$movie->category_id}}</td>
                    <td><a class="btn btn-success" href="/movie/{{$movie->id}}">Ver</a></td>
                </tr>
            </tbody>
        </table>
    @endforeach
</div>
@endsection
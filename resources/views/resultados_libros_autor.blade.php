@extends("partials.plantilla")
@section('titulo', 'Resultados')
@section('contenido')
    <h1 class="text-center">Listado de libros del autor {{$nombreAutor}}</h1>
    <ul class="fs-3 m-auto w-25">
        @foreach($libros as $entrada)
            <li>{{$entrada->titulo}}</li>
        @endforeach
    </ul>
@endsection

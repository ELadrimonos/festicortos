@extends("partials.plantilla")
@section('titulo', 'Resultados')
@section('contenido')
    <h1 class="text-center">Listado de libros del autor {{$autor->nombre}}</h1>
    <ul class="fs-3 m-auto w-25">
        @foreach($libros as $entrada)
            <li><a href="{{route('libros.get_libro', $entrada->id)}}">{{$entrada->titulo}}</a></li>
        @endforeach
    </ul>
    <a class="btn btn-primary bottom-0 position-absolute m-5 z-3  w-25 end-0" href="{{route('libros.get_libros_autor', $autor->id)}}">Descargar lista libros de {{$autor->nombre}}</a>
@endsection

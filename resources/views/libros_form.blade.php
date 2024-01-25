@extends('partials.plantilla')

@section('titulo')
    @isset($id)
        Editar
    @else
        Crear
    @endif
@endsection

@section('contenido')
    <form action="{{isset($libro) ? route('libros.update', $id) : route('libros.store')}}" method="POST">
        @csrf
        @method( isset($id) ? 'PUT' : 'POST' )
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{ isset($libro) ? $libro->titulo : ''}}">
        <label for="editorial">Editorial</label>
        <input type="text" name="editorial" id="editorial" value="{{ isset($libro) ? $libro->editorial : ''}}">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" value="{{ isset($libro) ? $libro->precio : ''}}">
        <label for="autor">Autor</label>
        <input type="text" name="id_autor" id="autor" value="{{ isset($libro) ? $libro->id_autor : ''}}">
        <input type="submit" value="{{ isset($libro) ? 'Modificar' : 'Insertar' }}">
    </form>
@endsection

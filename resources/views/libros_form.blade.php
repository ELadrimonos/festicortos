@extends('partials.plantilla')

@section('titulo')
    @isset($id)
        Editar
    @else
        Crear
    @endif
@endsection

@section('contenido')
    <form action="{{isset($id) ? route('libros.update', $id) : route('libros.store')}}" method="POST">
    </form>
@endsection

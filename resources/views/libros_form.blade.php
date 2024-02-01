@extends('partials.plantilla')

@section('titulo')
    @isset($id)
        Editar
    @else
        Crear
    @endif
@endsection

@section('contenido')
    <form action="{{isset($libro) ? route('libros.update', $id) : route('libros.store')}}" method="POST" class="w-25 m-auto
    d-flex flex-column justify-content-center gap-2">
        @csrf
        @method( isset($id) ? 'PUT' : 'POST' )
        <label class="form-label fs-2" for="titulo">Título</label>
        <input type="text" name="titulo" required id="titulo" value="{{ isset($libro) ? $libro->titulo : ''}}">
        <label class="form-label fs-2" for="editorial">Editorial</label>
        <input type="text" name="editorial" required id="editorial" value="{{ isset($libro) ? $libro->editorial : ''}}">
        <label class="form-label fs-2" for="precio">Precio</label>
        <input type="text" name="precio" required id="precio" value="{{ isset($libro) ? $libro->precio : ''}}">
        <label class="form-label fs-2" for="autor">Autor</label>
        <select name="id_autor" id="autor" class="form-select form-select-lg mb-4">
            @foreach($autores as $autor)
                <option value="{{$autor->id}}" {{(isset($libro) && ($libro->id_autor === $autor->id)) ? 'selected' : ''}}>{{$autor->nombre}}</option>
            @endforeach
        </select>
        <input class="btn btn-primary fs-3" type="submit" value="{{ isset($libro) ? 'Modificar' : 'Insertar' }}">
    </form>
@endsection

@extends('partials.plantilla')

@section('titulo')
    @isset($id)
        Editar
    @else
        Crear
    @endif
@endsection

@section('contenido')
    <form action="{{isset($autor) ? route('autores.update', $id) : route('autores.store')}}" method="POST" class="w-25 m-auto
    d-flex flex-column justify-content-center gap-2">
        @csrf
        @method( isset($id) ? 'PUT' : 'POST' )
        <label class="form-label fs-2" for="nombre">Nombre</label>
        <input type="text" name="nombre" required id="nombre" value="{{ isset($autor) ? $autor->nombre : ''}}">
        <label class="form-label fs-2" for="nacimiento">Año de nacimiento</label>
        <input type="text" name="nacimiento" required id="nacimiento" minlength="4" maxlength="4"   inputmode="numeric"
               pattern="[0-9\s]{4}" value="{{ isset($autor) ? $autor->nacimiento : ''}}">
        <input class="btn btn-primary fs-3" type="submit" value="{{ isset($autor) ? 'Modificar' : 'Insertar' }}">
    </form>
@endsection

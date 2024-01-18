@extends('partials.plantilla')
@section('titulo', 'Detalles')
@section('contenido')
    <div class="container justify-content-center">

        <div class="col-sm-3">
            <div class="card border-0">
                <div class="card-body">
                    <h1 class="card-title mb-md-4">{{$libro["titulo"]}}</h1>
                    <h3 class="card-title mb-md-4">{{$libro["autor"]}}</h3>
                    <a href="{{route("listado_libros")}}" class="fs-4">volver</a>
                </div>
            </div>
        </div>

    </div>
@endsection

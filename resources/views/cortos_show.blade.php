@extends('partials.plantilla')
@section('titulo', 'Detalles')
@section('contenido')
    <div class="container d-flex justify-content-center">

        <div class="col-sm-3">
            <div class="card border-0">
                <div class="card-body">
                    <h1 class="card-title mb-md-4">{{$entrada["titulo"]}}</h1>
                    <h3 class="card-title mb-md-4">{{$entrada["director"]}}</h3>
                    <p class="card-text fs-5">{{$entrada["sinapsis"]}}</p>
                    <a href="{{route("cortos.index")}}" class="fs-4">Volver</a>
                </div>
            </div>
        </div>

    </div>
@endsection

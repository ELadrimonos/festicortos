@extends("partials.plantilla")
@section('titulo', 'Cortos')
@section('contenido')
    <section class="container">
    @foreach($libros as $index => $libro)
        @if($index == 0 || $index % 3 == 0)
                <div class="row">
                @endif

                <div class="col-sm-3">
                    <div class="card border-0">
                        <div class="card-body">
                            <h1 class="card-title mb-md-4">{{$libro["titulo"]}}</h1>
                            <h3 class="card-title mb-md-4">{{$libro["autor"]}}</h3>
                            <a href="{{route("detalle_libro", $index)}}" class="btn btn-primary fs-4">Detalles</a>
                        </div>
                    </div>
                </div>

                @if(($index + 1) % 3 == 0 || $loop->last)
            </div>
        @endif

    @endforeach
    </section>
@endsection

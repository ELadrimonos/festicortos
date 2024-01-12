@extends("partials.plantilla")
@section('titulo', 'Cortos')
@section('contenido')
    <section class="container justify-content-center gap-2 ps-lg-5">
    @foreach($cortos as $index => $corto)
        @if($index == 0 || $index % 3 == 0)
            <div class="row">
                @endif

                <div class="col-sm-3 mw-50">
                    <div class="card border-0">
                        <div class="card-body">
                            <h1 class="card-title">{{$corto["titulo"]}}</h1>
                            <h6 class="card-title mb-md-4">{{$corto["director"]}}</h6>
                            <p class="card-text fs-5">{{$corto["sinapsis"]}}</p>
                            <a href="#" class="btn btn-primary fs-4">Detalles</a>
                        </div>
                    </div>
                </div>

                @if(($index + 1) % 3 == 0 || $loop->last)
            </div>
        @endif

    @endforeach
    </section>
@endsection

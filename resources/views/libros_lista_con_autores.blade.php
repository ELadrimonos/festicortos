@extends("partials.plantilla")
@section('titulo', 'Libros y Autores')
@section('contenido')
    <ul>
        @foreach($entradas as $entrada)
            <li><a class="btn-link">{{$entrada[0]->titulo . " (" . $entrada[1]->nombre . ")"}}</a></li>
        @endforeach
    </ul>
    <div class="d-flex justify-content-start m-3 w-100 gap-3">
{{--        Habría que hacer que sepa todas las páginas que hay dinámicamente --}}
        @for($i = 1; $i < 3; $i++)
            <a class="btn {{$i == $pagina ? 'btn-primary text-light' : 'btn-outline-secondary'}}" href="{{route('libros.entries', $i)}}">{{$i}}</a>
        @endfor
    </div>
@endsection

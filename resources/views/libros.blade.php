@extends("partials.plantilla")
@section('titulo', 'Cortos')
@section('contenido')
    <section class="container d-flex justify-content-center">
        <table class="table thead-dark w-75 fs-4 border-dark table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Autor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libros as $libro)

                    <tr>
                        <td class="card-title mb-md-4">{{$libro["titulo"]}}</td>
                        <td class="card-title mb-md-4">{{$libro["autor"]}}</td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </section>
@endsection

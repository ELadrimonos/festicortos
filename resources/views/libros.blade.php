@extends("partials.plantilla")
<<<<<<< HEAD
@section('titulo', 'Libros')
=======
@section('titulo', 'Cortos')
>>>>>>> 8ae570038ae6bbab7967f854b6380d61a28f8561
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
                        <td class="card-title mb-md-4">{{$libro->titulo}}</td>
{{--                        TODO Obtener nombre autor--}}
                        <td class="card-title mb-md-4">{{$libro->autor->nombre}}</td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </section>
@endsection

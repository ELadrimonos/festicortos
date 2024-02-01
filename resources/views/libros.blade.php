@extends("partials.plantilla")
@section('titulo', 'Libros')
@section('contenido')
    <section class="container d-flex justify-content-center">
        <table class="table thead-dark w-75 fs-4 border-dark table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">Titulo</th>
                    <th scope="col" class="text-center">Editorial</th>
                    <th scope="col" class="text-center">Precio</th>
                    <th scope="col" class="text-center">Autor</th>
                    <th colspan="2" scope="col"><a class="btn btn-outline-success w-100" href="{{route('libros.create')}}">Insertar</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($libros as $libro)

                    <tr>
                        <td class="card-title mb-md-4">{{$libro->titulo}}</td>
                        <td class="card-title mb-md-4">{{$libro->editorial}}</td>
                        <td class="card-title mb-md-4">{{$libro->precio}}</td>
                        <td class="card-title mb-md-4">
                            @foreach($autores as $autor)
                                @if($autor->id === $libro->id_autor)
                                    {{$autor->nombre}}
                                @endif
                            @endforeach
                        </td>
                        <td class="card-title mb-md-4"><a class="btn btn-outline-primary w-100" href="{{route('libros.edit', $libro->id)}}">Modificar</a></td>
{{--                        Para poder usar la ruta de .destroy, debo pasar el metodo DELETE. Para ahorrar hacer un formulario creo una función de JS--}}
                        <td class="card-title mb-md-4"><a class="btn btn-outline-danger w-100" onclick="eliminarLibro({{ $libro->id }})">Eliminar</a></td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </section>
    <script>
        function eliminarLibro(libroId) {
            if (confirm('¿Estás seguro de que deseas eliminar este libro?')) {
                fetch("{{ url('libros/borrar') }}" + "/" + libroId, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                    .then(function() {
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Hubo un problema con la solicitud DELETE:', error);
                    });
            }
        }
    </script>
@endsection

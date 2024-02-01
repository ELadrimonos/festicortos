@extends("partials.plantilla")
@section('titulo', 'Autores')
@section('contenido')
    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif


   @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <section class="container d-flex justify-content-center">
        <table class="table thead-dark w-75 fs-4 border-dark table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Nacimiento</th>
                    <th colspan="2" scope="col"><a class="btn btn-outline-success w-100" href="{{route('autores.create')}}">Insertar</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($autores as $autor)

                    <tr>
                        <td class="card-title mb-md-4">{{$autor->nombre}}</td>
                        <td class="card-title mb-md-4">{{$autor->nacimiento}}</td>
                        <td class="card-title mb-md-4"><a class="btn btn-outline-primary w-100" href="{{route('autores.edit', $autor->id)}}">Modificar</a></td>
{{--                        Para poder usar la ruta de .destroy, debo pasar el metodo DELETE. Para ahorrar hacer un formulario creo una función de JS--}}
                        <td class="card-title mb-md-4"><a class="btn btn-outline-danger w-100" onclick="eliminarAutor({{ $autor->id }})">Eliminar</a></td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </section>
    <script>
        function eliminarAutor(autorId) {
            if (confirm('¿Estás seguro de que deseas eliminar este autor?')) {
                fetch("{{ url('autores/borrar') }}" + "/" + autorId, {
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

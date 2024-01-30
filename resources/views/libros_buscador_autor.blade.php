@extends("partials.plantilla")
@section('titulo', 'Buscador de Libros por Autor')
@section('contenido')
    <h1 class="text-center title">Buscar libros por autor</h1>
    <form class="d-flex justify-content-center w-25 m-auto" method="POST" action="{{route('libros.filtrar')}}">
        @csrf
        @method('POST')
        <input class="form-control" type="text" name="nombre_autor" id="buscador">
        <input class="btn btn-outline-primary" type="submit" value="Buscar">
    </form>
    <ul id="resultados" class="list-group w-25 m-auto">
    </ul>
    <script>
        const source = document.getElementById('buscador');
        const result = document.getElementById('resultados');

        const inputHandler = function(e) {
            const valor = e.target.value;
            result.innerHTML = '';
            let listado = {!! json_encode($autores) !!};
            listado = listado.filter(element => element['nombre'].toLowerCase().startsWith(valor.toLowerCase()));
            console.log(listado)
                for (const listadoElement of listado) {
                    const elementoLista = document.createElement("li");
                    elementoLista.innerText = listadoElement['nombre'];
                    elementoLista.className = 'text-center list-group-item btn-link'

                    elementoLista.onclick = () => {
                        source.value = listadoElement['nombre'];
                        result.innerHTML = '';
                    }

                    result.appendChild(elementoLista);
                }


        }



        source.addEventListener('input', inputHandler);
        source.addEventListener('click', inputHandler);

        let clearResultsTimeout;

        source.addEventListener('blur', () => {
            // Hago un pequeño retraso en caso hagan click fuera puedan hacer hover y que no desaparezca los resultados
            clearResultsTimeout = setTimeout(() => {
                result.innerHTML = '';
            }, 200);
        });

        result.addEventListener('click', () => {
            clearTimeout(clearResultsTimeout);
        });

        result.addEventListener('mouseover', () => {
            clearTimeout(clearResultsTimeout);
        });


        source.addEventListener('propertychange', inputHandler);
    </script>
@endsection

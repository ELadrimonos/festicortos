<nav class="navbar navbar-expand-lg navbar-light bg-light m-4">
    <a class="navbar-brand" href="{{route('home')}}">Festicortos</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cortos.index')}}">Lista de cortos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('libros.index')}}">Tabla de libros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('libros.entries', 1)}}">Lista de libros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('libros.buscar')}}">Filtro por autor</a>
            </li>
        </ul>
    </div>
</nav>

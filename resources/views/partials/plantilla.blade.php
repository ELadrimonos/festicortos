<html>
<head>
    <title>
        @yield('titulo')
    </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
@include('partials.navbar')

@yield('contenido')

<footer class="card-footer text-body-secondary fixed-bottom m-5 fs-5">© DAW - Desarrollo Web en Entorno Servidor</footer>
</body>
</html>

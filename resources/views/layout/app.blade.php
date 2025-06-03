<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        @vite(['resources/sass/app.scss','resources/js/app.js'])
    </head>
    <body>
        @include('layout.menu')
        <div class="container mt-4">
            @yield('content')
        </div>
    </body>
</html>

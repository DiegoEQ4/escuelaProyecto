<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @vite(['resources/sass/app.scss','resources/js/app.js'])

    </head>
    <body>
        @include('layout.menu')
        <div class="container mt-4">
            @yield('content')
        </div>
    </body>


    @if (session('success'))
        <script>
            Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
            icon: 'error',
            title: '¡Ups!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33'
            });
        </script>
    @endif


</html>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión Escolar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 text-center">
        <h1 class="mb-4">Bienvenido al Sistema de Gestión Escolar</h1>
        <p class="mb-4">Selecciona una opción para administrar los datos:</p>

        <div class="row justify-content-center g-3">
            <div class="col-md-4">
                <a href="{{ route('grados.index') }}" class="btn btn-primary w-100">🧑‍🏫 GRADOS</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('materias.index') }}" class="btn btn-secondary w-100">📚 MATERIAS</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('clases.index') }}" class="btn btn-success w-100">📅 CLASES</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('estudiantes.index') }}" class="btn btn-warning w-100">👨‍🎓 ESTUDIANTES</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('usuarios.index') }}" class="btn btn-dark w-100">🧑‍💼 USUARIOS</a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="text-center mb-5">TABLAS DE REGISTRO</h1>

        <!-- Tabla Grados -->

        <div class="mb-5">
            <h3>Grados Registrados</h3>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre del Grado</th>
                        <th>Sección</th>
                        <th>Cupos</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($grados as $grado)
                        <tr>
                            <td>{{ $grado->nombre }}</td>
                            <td>{{ $grado->seccion }}</td>
                            <td>{{ $grado->cupos }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No hay grados registrados.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Tabla Materias -->
        <div>
            <h3>Materias Disponibles</h3>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Duración (meses)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($materias as $materia)
                        <tr>
                            <td>{{ $materia->nombre }}</td>
                            <td>{{ $materia->descripcion }}</td>
                            <td>{{ $materia->duracion_meses }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No hay materias registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
<!--
         Tabla Clases 
        <div>
            <h3>Clases</h3>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Duración (meses)</th>
                    </tr>
                </thead>
                <tbody>
                    forelse($)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    empty
                        <tr><td colspan="3">No hay clases registradas.</td></tr>
                    endforelse
                </tbody>
            </table>
        </div>

         Tabla Estudiantes 
        <div>
            <h3>Estudiantes registrados</h3>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Carnet</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Fecha de nacimiento</th>
                        <th>ID Grado</th>
                        <th>ID Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    forelse()
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    empty
                        <tr><td colspan="3">No hay estudiantes registrados.</td></tr>
                    endforelse
                </tbody>
            </table>
        </div>

         Tabla Usuarios 
        <div>
            <h3>Materias Disponibles</h3>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre del usuario</th>
                        <th>Tipo de usuario</th>
                    </tr>
                </thead>
                <tbody>
                    forelse()
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    empty
                        <tr><td colspan="3">No hay usuarios registrados</td></tr>
                    endforelse
                </tbody>
            </table>
        </div> -->
    </div>
</body>
</html>

>>>>>>> Stashed changes

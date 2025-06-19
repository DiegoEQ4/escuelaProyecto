@extends('layout.app')

@section('content')
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
                            <td>{{ $materia->duracion }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No hay materias registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection()

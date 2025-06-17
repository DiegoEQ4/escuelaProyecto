@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">¡Bienvenido/a👋</h2>
    <p class="text-muted">Hoy es {{ \Carbon\Carbon::now()->locale('es')->isoFormat('dddd D [de] MMMM [de] YYYY') }}</p>

    <!-- Cards resumen -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary">📚 Materias asignadas</h5>
                    <p class="card-text fs-4">3</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-success">📅 Clases hoy</h5>
                    <p class="card-text fs-4">2</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-warning">📝 Asistencias pendientes</h5>
                    <p class="card-text fs-4">1</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla simple sin JS -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-secondary text-white">
            📋 Clases del día
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Materia</th>
                        <th>Grado</th>
                        <th>Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>08:00 AM</td>
                        <td>Matemática</td>
                        <td>9° A</td>
                        <td><span class="badge bg-success">Registrada</span></td>
                    </tr>
                    <tr>
                        <td>10:00 AM</td>
                        <td>Ciencias</td>
                        <td>9° B</td>
                        <td>
                            <form action="#" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Registrar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection

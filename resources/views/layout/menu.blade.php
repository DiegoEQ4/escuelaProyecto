@php
    $tipos = [1 => 'Alumno', 2 => 'Profesor', 3 => 'Administrador'];
@endphp

<nav class="navbar navbar-expand-lg bg-primary {{ Request::is('login') ? 'd-none' : '' }}" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand mx-4" href="{{ route('dashboard') }}">Sistema de gestión escolar</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- Enlaces del menú (lado izquierdo) -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mx-2">
          <a class="nav-link" href="{{ route('grados.index') }}">Grados</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="{{ route('asistencias.index') }}">Asistencias</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="{{ route('materias.index') }}">Materias</a>
        </li>
        <li class="nav-item mx-2 {{ session('tipo') != 2 ? 'd-none' : '' }}">
          <a class="nav-link" href="{{ route('materia_detalle.index', session('carnet') ?? 0) }}">Materias impartidas</a>
        </li>
        <!-- 
        <li class="nav-item mx-2">
          <a class="nav-link" href="#">Clases</a>
        </li> 
        -->
        <li class="nav-item mx-2 dropdown {{ session('tipo') != 3 ? 'd-none' : '' }}">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a></li>
            <li><a class="dropdown-item" href="{{ route('estudiantes.index') }}">Estudiantes</a></li>
            <li><a class="dropdown-item" href="{{ route('profesores.index') }}">Profesores</a></li>
          </ul>
        </li>
      </ul>

      <!-- Usuario y logout (lado derecho) -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          @auth
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->nombreUsuario }} ({{ $tipos[session('tipo')] ?? 'Desconocido' }})
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <form action="{{ route('login.logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item">Cerrar sesión</button>
                </form>
              </li>
            </ul>
          @endauth
        </li>
      </ul>
    </div>
  </div>
</nav>

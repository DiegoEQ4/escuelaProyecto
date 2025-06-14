
@php
{{ $tipos = [1 => 'Alumno', 2 => 'Profesor', 3 => 'Administrador']; }}
@endphp

<nav class="navbar navbar-expand-lg bg-primary  {{ Request::is('login') ? 'd-none' : '' }}" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand mx-4" href="{{ route('dashboard') }}">Sistema de gestion escolar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item mx-2">
          <a class="nav-link" aria-current="page" href="{{ route('grados.index') }}">Grados</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="{{ route('materias.index') }}">Materias</a>
        </li>
        <li class="nav-item mx-2 {{ session('tipo') != 2 ? 'd-none' : '' }}">
          <a class="nav-link" href="{{ route('materias.index') }}">Materias impartidas</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="#">Clases</a>
        </li>
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
       <div class="d-flex nav-item mx-2">
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  @auth
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                            {{ Auth::user()->nombreUsuario;}} ( {{ $tipos[session('tipo')] ?? 'Desconocido' }} ) 
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <form action="{{route('login.logout')}}" method="POST">
                                  @csrf
                                  <button class="btn" type="submit">Cerrar sesión</button>
                              </form>
                          </li>
                      </ul>
                  @endauth
              </li>
          </ul>
      </div>
    </div>
  </div>
</nav>
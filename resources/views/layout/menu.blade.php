<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand mx-4" href="#">Sistema de gestion escolar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item mx-2">
          <a class="nav-link" aria-current="page" href="{{ route('grados.index') }}">Grado</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="{{ route('materias.index') }}">Materias</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
        </li>
        <li class="nav-item mx-2 dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Clases
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
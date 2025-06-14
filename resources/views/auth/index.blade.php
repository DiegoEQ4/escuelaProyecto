@extends('layout.app')

@section('content')

<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 shadow rounded-4" style="width: 100%; max-width: 400px;">
    
    <div class="text-center mb-4">
      <i class="bi bi-person-circle" style="font-size: 4rem; color: #0d6efd;"></i>
      <h4 class="mt-2">Iniciar Sesión</h4>
    </div>

    @if(session('error'))
      <div class="alert alert-danger text-center">
        {{ session('error') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login.auth') }}">
      @csrf
      
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="tucorreo@correo.com" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </div>

      <div class="text-center mt-3">
        <a href="#">¿Olvidaste tu contraseña?</a>
      </div>
    </form>
  </div>
</div>

@endsection

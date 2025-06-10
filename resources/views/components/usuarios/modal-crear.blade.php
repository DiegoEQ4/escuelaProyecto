<!-- Modal -->
<div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="multiStepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="multiStepModalLabel">Paso 1: Informacion personal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <!-- Paso 1 -->
        <form id="formMultiPaso" action="{{ route('usuarios.store') }}" method="POST">
          @csrf

          <div id="step1">
            <section id="forms-controls">
              <div class="row">
                <div class="row">
                  <div class="mb-3 col-4">
                    <label class="form-label">Carnet</label>
                    <input type="text" class="form-control" name="carnet" required>
                  </div>
                </div>
                <div class="mb-3 col-6">
                  <label class="form-label">Nombres</label>
                  <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3 col-6">
                  <label class="form-label">Apellidos</label>
                  <input type="text" class="form-control" name="apellido" required>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Correo</label>
                  <input type="email" class="form-control" name="correo" required>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Fecha de nacimiento</label>
                  <input type="date" class="form-control" name="fechaNacimiento">
                </div>
                <div class="mb-3 col-12">
                  <label for="tipo" class="form-label">Tipo de usuario</label>
                  <select class="form-select" id="tipo" name="tipo">
                      <option value="3">Administrador</option>
                      <option value="2">Profesor</option>
                      <option value="1" selected>Alumno</option>
                  <select>
                </div>
                <div id="camposProfe" class="row d-none">
                  <div class="mb-3 col-5">
                    <label class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono">
                  </div>
                  <div class="mb-3 col-7">
                    <label class="form-label">Título</label>
                    <input type="text" class="form-control" name="titulo">
                  </div>
                </div>
              </div>
            </section>
            <button type="button" class="btn btn-primary w-100" onclick="siguientePaso()">Siguiente</button>
          </div>
         <!-- Paso 2 -->
          <div id="step2" class="d-none">
            <div class="mb-3">
              <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
              <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
            </div>
            <div class="mb-3">
              <label for="contrasena" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <div class="row">
                <div class = "col-6"><button type="button" class="btn btn-danger w-100" onclick="anteriorPaso()">Atras</button></div>
                <div class = "col-6"><button type="submit" class="btn btn-success w-100 col-6">Finalizar</button></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script para cambiar pasos -->
<script>
    function siguientePaso() {
      const step1Inputs = document.querySelectorAll('#step1 input, #step1 select');
      let esValido = true;
      step1Inputs.forEach(input => {
          if (!input.checkValidity()) {
              input.reportValidity();
              esValido = false;
              return;
          }
      });

      if (!esValido) return;

      document.getElementById('step1').classList.add('d-none');
      document.getElementById('step2').classList.remove('d-none');
      document.getElementById('multiStepModalLabel').innerText = 'Paso 2: Credenciales para el sistema';
    }

    function anteriorPaso() {
        document.getElementById('step2').classList.add('d-none');
        document.getElementById('step1').classList.remove('d-none');
        document.getElementById('multiStepModalLabel').innerText = 'Paso 1: Informacion personal';
  }

    document.getElementById('tipo').addEventListener('change', function () {
    const camposProfe = document.getElementById('camposProfe');

    if (this.value === '2') {
      camposProfe.classList.remove('d-none');
    } else {
      camposProfe.classList.add('d-none');
    }

  });
</script>
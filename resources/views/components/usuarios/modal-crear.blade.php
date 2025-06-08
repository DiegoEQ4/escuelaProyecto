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
        <form id="formPaso1">
          <div id="step1">
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="nombre" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombre" required>
                </div>
                <div class="mb-3 col-6">
                    <label for="nombre" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellido" required>
                </div>
                <div class="mb-3 col-12">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3 col-12">
                    <label for="fecha" class="form-label">Introduce la fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha" name="fechaNacimiento">
                </div>
                <div class="mb-3 col-12">
                    <label for="tipo" class="form-label">Tipo de usuario</label>
                    <select class="form-select" id="tipo" name="tipo">
                        <option value="3">Administrador</option>
                        <option value="2">Profesor</option>
                        <option value="1" selected>Estudiante</option>
                    <select>
                </div>
                <div id="camposProfe" class="row d-none">
                    <div class="mb-3 col-5">
                        <label for="nombre" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="telefono" required>
                    </div>
                    <div class="mb-3 col-7">
                        <label for="nombre" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" required>
                    </div>
                </div>

            </div>
            <button type="button" class="btn btn-primary w-100" onclick="siguientePaso()">Siguiente</button>
          </div>
        </form>
         <!-- Paso 2 -->
        <form id="formPaso2" class="d-none">
          <div id="step2">
            <div class="mb-3">
              <label for="contrasena" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="contrasena" required>
            </div>
            <div class="mb-3">

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
        const formPaso1 = document.getElementById('formPaso1');
        // Validar los campos requeridos del formulario paso 1
        if (!formPaso1.checkValidity()) {
            formPaso1.reportValidity(); // Muestra los mensajes de error del navegador
            return; // No avanzar si no es válido
        }

        document.getElementById('formPaso1').classList.add('d-none');
        document.getElementById('formPaso2').classList.remove('d-none');
        document.getElementById('multiStepModalLabel').innerText = 'Paso 2: Cuenta del usuario';
    }

    function anteriorPaso() {
        document.getElementById('formPaso2').classList.add('d-none');
        document.getElementById('formPaso1').classList.remove('d-none');
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
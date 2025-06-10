{{-- <!-- Modal -->
<div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="multiStepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="multiStepModalLabel">Paso 1: Informacion personal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <!-- Paso 1 -->
        <form id="formMultiPaso" action="{{ route('estudiantes.update') }}" method="POST">
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
            <button type="submit" class="btn btn-primary w-100" >Finalizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> --}}

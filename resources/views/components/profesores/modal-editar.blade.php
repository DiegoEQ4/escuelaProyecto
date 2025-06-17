<!-- Modal -->
@props(['carnet','nombre','apellido','correo','nacimiento','telefono','titulo'])

<div class="modal fade" id="editarModal-{{ $carnet }}" tabindex="-1" aria-labelledby="multiStepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="multiStepModalLabel">Paso 1: Informacion personal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <!-- Paso 1 -->
        <form id="formMultiPaso" action="{{ route('profesores.update') }}" method="POST">
          @csrf
          <div id="step1">
            <section id="forms-controls">
              <div class="row">
                <div class="row">
                  <div class="mb-3 col-4">
                    <label class="form-label">Carnet</label>
                    <input type="text" class="form-control" name="carnet" value="{{ $carnet }}" required readonly>
                  </div>
                </div>
                <div class="mb-3 col-6">
                  <label class="form-label">Nombres</label>
                  <input type="text" class="form-control" name="nombre" value="{{ $nombre }}" required>
                </div>
                <div class="mb-3 col-6">
                  <label class="form-label">Apellidos</label>
                  <input type="text" class="form-control" name="apellido" value="{{ $apellido }}" required>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Correo</label>
                  <input type="email" class="form-control" name="correo" value="{{ $correo }}" required>
                </div>
                <div class="mb-3 col-12">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" value="{{ \Carbon\Carbon::parse($nacimiento)->format('Y-m-d') }}">
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                      <label class="form-label">Telefono</label>
                      <input type="email" class="form-control" name="telefono" value="{{ $telefono }}" required>
                    </div>
                    <div class="mb-3 col-6">
                      <label class="form-label">Titulo</label>
                      <input type="email" class="form-control" name="correo" value="{{ $titulo }}" required>
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
</div>

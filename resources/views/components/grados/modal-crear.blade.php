<!-- Modal -->
<div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="multiStepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="multiStepModalLabel">Crear grados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formMultiPaso" action="{{ route('grados.store') }}" method="POST">
          @csrf
          <div id="step1">
            <section id="forms-controls">
              <div class="row">
                <div class="row">
                  <div class="mb-3 col-12">
                    <label class="form-label">Nombre del grado</label>
                    <input type="text" class="form-control" name="nombre" required>
                  </div>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Seccion</label>
                  <input type="text" class="form-control" name="seccion" required>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Cupos</label>
                  <input type="text" class="form-control" name="cupos" required>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Orden</label>
                  <select class="form-select" name="orden" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  
                  </select>
                </div>
                <div class="mb-3 col-6">
                  {{-- <label class="form-label">Año lectivo</label> --}}
                  <input type="hidden" class="form-control" name="tiempo" value="2025" required>
                </div>
              </div>
            </section>
          </div>
            <div class="row">
                <div class = "col-12"><button type="submit" class="btn btn-success w-100 col-6">Agregar</button></div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script para cambiar pasos -->
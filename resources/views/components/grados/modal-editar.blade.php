@props(['idGrado','nombre','seccion','cupos','orden'])

<!-- Modal -->
<div class="modal fade" id="editarModal-{{ $idGrado }}" tabindex="-1" aria-labelledby="multiStepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="multiStepModalLabel">Crear grados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formMultiPaso" action="{{ route('grados.update') }}" method="POST">
          @csrf
          <input type="hidden" class="form-control" name="idGrado" value="{{ $idGrado }}" required>
          <div id="step1">
            <section id="forms-controls">
              <div class="row">
                <div class="row">
                  <div class="mb-3 col-12">
                    <label class="form-label">Nombre del grado</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $nombre }}" required>
                  </div>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Seccion</label>
                  <input type="text" class="form-control" name="seccion" value="{{ $seccion }}" required>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Cupos</label>
                  <input type="text" class="form-control" name="cupos"  value="{{ $cupos }}" required>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Orden</label>
                  <select class="form-select" name="orden" required  value="{{ $orden }}">
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
                <div class = "col-12"><button type="submit" class="btn btn-primary w-100 col-6">Actualizar</button></div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script para cambiar pasos -->
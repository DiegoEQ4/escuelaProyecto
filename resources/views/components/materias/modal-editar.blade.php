<!-- Modal -->
@props(['idMateria','nombre','descripcion','duracion'])   


<div class="modal fade" id="editarModal-{{ $idMateria }}" tabindex="-1" aria-labelledby="multiStepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="multiStepModalLabel">Paso 1: Informacion personal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formMultiPaso" action="{{ route('materias.update') }}" method="POST">
            @csrf
            <div id="step1">
            <input type="hidden" class="form-control" name="idMateria" value="{{ $idMateria }}" required>
            <section id="forms-controls">
              <div class="row">
                <div class="row">
                  <div class="mb-3 col-12">
                    <label class="form-label">Nombre de Materia</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $nombre }}" required>
                  </div>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Descripcion</label>
                  <input type="text" class="form-control" name="descripcion" value="{{ $descripcion }}" required>
                </div>
                <div class="mb-3 col-6">
                  <label class="form-label">Duracion (formato en meses)</label>
                  <input type="number" class="form-control" name="duracion" value="{{ $duracion }}" required>
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
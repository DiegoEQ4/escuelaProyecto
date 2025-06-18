@props(['clases'])
<!-- Modal -->
<div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="multiStepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="multiStepModalLabel">Crear Asistencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formMultiPaso" action="{{ route('asistencias.store') }}" method="POST">
          @csrf
          <div id="step1">
            <section id="forms-controls">
              <div class="row">
                <div class="row">
                  <div class="mb-3 col-12">
                    <label class="form-label">Clase</label>
                    <select name="clase" class="form-select">
                      @foreach ( $clases as $clase )                          
                        <option value="{{ $clase -> idClase }}">{{ $clase -> contenidoClase }} - {{ $clase -> nombre_materia }} - {{ $clase -> nombre_grado }} {{$clase -> seccion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Fecha de inicio</label>
                  <input type="datetime-local" class="form-control" name="fechaInicio" required>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Fecha de fin</label>
                  <input type="datetime-local" class="form-control" name="fechaFinal" required>
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
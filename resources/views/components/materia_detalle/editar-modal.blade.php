<!-- Modal -->
@props(["idDetalleMateria","idMateria","carnet","idGrado","grados","profesor","materias"])
<div class="modal fade" id="editarModal-{{ $idDetalleMateria }}" tabindex="-1" aria-labelledby="multiStepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="multiStepModalLabel">Editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formMultiPaso" action="{{ route('materia_detalle.update') }}" method="POST">
          @csrf
          <div id="step1">
            <section id="forms-controls">
              <div class="row">
                <div class="mb-3 col-12">
                    <input type="hidden" name="idDetalleMateria" value="{{ $idDetalleMateria }}"></input>
                    <input type="hidden" name="carnetProfesor" value="{{ $profesor }}"></input>
                    <label class="form-label">Seleccionar el grado</label>
                    <select name="idGrado" class="form-select">
                        @foreach ($grados as $grado)
                            <option value="{{ $grado->idGrado }}"
                                {{ (int)$grado->idGrado === (int)$idGrado ? 'selected' : '' }}>
                                {{ $grado->nombre }} - {{ $grado->seccion }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-12">
                    <label class="form-label">Seleccionar materia</label>
                    <select name="idMateria" class="form-select">
                        @foreach ($materias as $materia)
                            <option value="{{ $materia->idMateria }}"
                                {{ (int)$materia->idMateria === (int)$idMateria ? 'selected' : '' }}>
                                {{ $materia->nombre }}
                            </option>
                        @endforeach
                    </select>
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
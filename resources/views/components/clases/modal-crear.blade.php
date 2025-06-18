@props(["idDetalleMateria", "materia","clases"])
<div class="modal fade" id="modalClase-{{ $idDetalleMateria }}" tabindex="-1" aria-labelledby="multiStepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="multiStepModalLabel">Agrega un contenido a la materia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <!-- Paso 1 -->
        <form id="nuevaClase" action="{{ route('clases.store') }}" method="POST">
          @csrf

          <div id="step1">
            <section id="forms-controls">
              <div class="row">
                <div class="mb-3 col-12">
                  <label class="form-label">Tema o contenido <b class="text-danger">*</b></label>
                  <input type="text" class="form-control" name="contenido" required>
                </div>
                <div class="mb-3 col-12">
                  <label class="form-label">Duracion (horas) <b class="text-danger">*</b></label>
                  <input type="number" class="form-control" name="duracion" required>
                  <input type="hidden" class="form-control" name="detalle_materia" value="{{ $idDetalleMateria }}">
                </div>
              </div>
            </section>
            <button type="submit" class="btn btn-primary w-100" >Agregar Clase</button>
          </div>
        </form>
      </div>

     
      <div class="modal-header">  
        <h5 class="modal-title" id="multiStepModalLabel">Contenido de la materia: <b>{{$materia}}</b></h5>
      </div>

      <!-- ENCABEZADO DE TABLA -->
      <div class="modal-body px-4">
        <div class="row bg-primary text-white py-2">
            <div class="col-7">
                Contenido
            </div>
            <div class="col-3">
                Duracion
            </div>
            <div class="col-2">
                Eliminar
            </div>
        </div>

        <!-- REGISTROS DE LA TABLA -->
        @foreach ( $clases as $clase )          
          <div class="row border-bottom py-2">
              <div class="col-7 d-flex align-items-center">
                {{ $clase -> contenidoClase }}
              </div>
              <div class="col-3 d-flex align-items-center">
                {{ $clase -> duracion }}
              </div>
              <div class="col-2">
                  <a type="button" class="btn btn-danger" href="{{ route('clases.delete',$clase->idClase) }}">
                      <b> <i class="bi bi-trash3-fill"></i></b>
                  </a>
              </div>
          </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center">
          {{ $clases->links() }}
      </div>
    </div>
  </div>
</div>
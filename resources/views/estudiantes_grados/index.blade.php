@extends('layout.app')

@section('content')

<h2>Asignacion de estudiantes a grados</h2>

<div class="card shadow rounded-3 p-3 my-3">
<h5 class="m-2">Buscar y Agregar Usuario</h5>
  <div class="card-body">
    <form method="post" action="{{ route('estudiante_grado.store',request()->route('id')) }}">
      @csrf

      <div class="mb-3">
        <input list="nombres" name="nombre" autocomplete="off" id="nombre_usuario" class="form-control" placeholder="Escribe un nombre..." required>
        <!-- Campo oculto donde se guarda el carnet -->
        <input type="hidden" name="carnet" id="carnet_usuario">
        <input type="hidden" name="idGrado" value="{{ request()->route('id') }}">

        <datalist id="nombres">
          @foreach($estudiantes as $e)
            <option data-carnet="{{ $e->carnet }}" value="{{ $e->nombre }} {{ $e->apellido }}"></option>
          @endforeach
        </datalist>
      </div>
      <div class="text-end">
          <button type="submit" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Agregar
          </button>
      </div>
    </form>
  </div>
</div>


<table class="table table-light table-borderless rounded shadow border border-dark-subtle">
    <thead>
    <tr>
      <th scope="col">Carnet</th>
      <th scope="col">Nombre del estudiante </th>
      <th scope="col">Correo</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
    <tbody class="table-group-divider">
    @foreach ($response as $estudiante)
        <tr>
            <th scope="row">{{ $estudiante -> carnet }}</th>
            <td>{{$estudiante ->nombre}} {{$estudiante ->apellido}}</td>
            <td>{{$estudiante ->correo}}</td>
            <td> 
                <a type="button" class="btn btn-danger" href="{{ route('estudiante_grado.delete',$estudiante ->carnet) }}">
                    <b> <i class="bi bi-trash3-fill"></i>   
                </a>
            </td>
        </tr>                 
        @endforeach
    </tbody>
</table>


@endsection()


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('nombre_usuario');
    const datalist = document.getElementById('nombres');
    const hiddenInput = document.getElementById('carnet_usuario');
    const form = input.closest('form');

    function actualizarCarnet() {
      const valor = input.value.trim();
      const opciones = datalist.options;
      let carnetEncontrado = '';

      for (let i = 0; i < opciones.length; i++) {
        if (opciones[i].value === valor) {
          carnetEncontrado = opciones[i].dataset.carnet;
          break;
        }
      }

      hiddenInput.value = carnetEncontrado;
    }

    input.addEventListener('input', actualizarCarnet);
    input.addEventListener('change', actualizarCarnet);

    form.addEventListener('submit', function (e) {
      actualizarCarnet();
      if (!hiddenInput.value) {
        e.preventDefault(); // Cancela el envío si no hay carnet
        alert('Por favor selecciona un nombre válido de la lista.');
      }
    });
  });
</script>
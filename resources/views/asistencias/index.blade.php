@extends('layout.app')

@section('content')

@php
    $numeral = 1;
@endphp
{{-- {{ dd($clases) }} --}}
<h2>Administracion de Asistencias</h2>

<section class="text-end my-2">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearModal">
         <b> <i class="bi bi-plus-circle"></i> Agregar </b>
    </button>
</section>

<table class="table table-light table-borderless rounded shadow border border-dark-subtle">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Clase</th>
      <th scope="col">Materia</th>
      <th scope="col">Grado</th>
      <th scope="col">Fecha Inicio</th>
      <th scope="col">Fecha Final</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
    <tbody class="table-group-divider">
    @foreach ($asistencias as $asistencia)        
        <tr>
            <th scope="row">{{ $numeral++ }}</th>
            <td>{{ $asistencia -> contenidoClase }}</td>
            <td>{{ $asistencia -> nombre_materia }}</td>
            <td>{{ $asistencia -> nombre }}</td>
            <td>{{ $asistencia -> fechaInicio }}</td>
            <td>{{ $asistencia -> fechaFinal }}</td>
            <td> 
                <a type="button" class="btn btn-primary" href="{{ route('detalle_asistencia.index',$asistencia->idAsistencia) }}">
                    <i class="bi bi-list-check"></i>
                </a>
            </td>
        </tr>              
    @endforeach
    </tbody>
</table>

<x-asistencias.modal-crear
    :clases="$clases"
></x-asistencias.modal-crear>

@endsection()


@extends('layout.app')

@section('content')

@php
    $numeral = 1;
@endphp

<h2>Materias impartidas por el profesor</h2>

<section class="text-end my-2">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearModal">
         <b> <i class="bi bi-plus-circle"></i> Agregar </b>
    </button>
</section>

<table class="table table-secondary table-borderless rounded shadow border border-dark-subtle">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Materia</th>
      <th scope="col">Grado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
    <tbody class="table-group-divider">
    @foreach ($response["detalle"] as $detalle)
        <tr>
            <th scope="row">{{ $numeral++ }}</th>
            <td>{{$detalle ->nombre_materia}}</td>
            <td>{{$detalle ->nombre_grado}} - {{$detalle ->seccion_grado}}</td>
            <td> 
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal-{{ $detalle->idMateriaDetalle }}">
                    <b> <i class="bi bi-pencil-fill text-white"></i></b>
                </button>
                <a type="button" class="btn btn-danger" href="{{ route('materia_detalle.delete',$detalle->idMateriaDetalle) }}">
                    <b> <i class="bi bi-trash3-fill"></i>
                </a>
            </td>
        </tr>              
        <x-materia_detalle.editar-modal 
            :grados="$response['grado']"
            :materias="$response['materia']"
            :profesor="request()->route('carnet')"
            :idDetalleMateria="$detalle->idMateriaDetalle" 
            :idMateria="$detalle->idMateria"
            :carnet="$detalle->carnet"
            :idGrado="$detalle->idGrado"
        ></x-materia_detalle.editar-modal>
        
        @endforeach
    </tbody>
</table>
<x-materia_detalle.crear-modal
    :grados="$response['grado']"
    :materias="$response['materia']"
    :profesor="request()->route('carnet')"
></x-materia_detalle.crear-modal>
@endsection()


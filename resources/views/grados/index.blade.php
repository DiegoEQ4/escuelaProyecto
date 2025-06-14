@extends('layout.app')

@section('content')

@php
    $numeral = 1;
@endphp

<h2>Administración de grados</h2>

<section class="text-end my-2">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearModal">
         <b> <i class="bi bi-plus-circle"></i> Agregar </b>
    </button>
</section>

<table class="table table-secondary table-borderless rounded shadow border border-dark-subtle">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Grado</th>
      <th scope="col">Seccion</th>
      <th scope="col">Cupos</th>
      <th scope="col">Año Lectivo</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
    <tbody class="table-group-divider">
    @foreach ($response as $grados)
        <tr>
            <th scope="row">{{ $numeral++ }}</th>
            <td>{{$grados ->nombre}} </td>
            <td>{{$grados ->seccion}}</td>
            <td>{{$grados ->cupos}}</td>
            <td>{{$grados ->tiempo}}</td>
            <td> 
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal-{{ $grados->idGrado }}">
                    <b> <i class="bi bi-pencil-fill text-white"></i></b>
                </button>
                <a type="button" class="btn btn-danger" href="{{ route('grados.delete',$grados->idGrado) }}">
                    <i class="bi bi-trash3-fill"></i>
                </a>
                <a type="button" class="btn btn-primary" href="{{ route('estudiante_grado.index',$grados->idGrado) }}">
                    <i class="bi bi-person-fill-add"></i>
                </a>
            </td>
        </tr>              
        <x-grados.modal-editar 
        :idGrado="$grados->idGrado" 
        :nombre="$grados->nombre"
        :seccion="$grados->seccion"
        :cupos="$grados->cupos"
        :orden="$grados->orden"
        ></x-grados.modal-editar>
        
        @endforeach
    </tbody>
</table>
<x-grados.modal-crear></x-grados.modal-crear>

@endsection()


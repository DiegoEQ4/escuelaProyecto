@extends('layout.app')

@section('content')

@php
    $numeral = 1;
@endphp

<h2 class="{{ session('tipo') == 1 ? 'd-none' : '' }}" >Administración de materias</h2>
<h2 class="{{ session('tipo') == 1 ? '' : 'd-none' }}" >Materias</h2>

<section class="text-end my-2">
    <button type="button" class="btn btn-success {{ session('tipo') == 1 ? 'd-none' : ''}} " data-bs-toggle="modal" data-bs-target="#crearModal">
         <b> <i class="bi bi-plus-circle"></i> Agregar </b>
    </button>
</section>

<table class="table table-light table-borderless rounded shadow border border-dark-subtle">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Duracion</th>
      <th scope="col" class="{{ session('tipo') == 1 ? 'd-none' : '' }}">Acciones</th>
    </tr>
  </thead>
    <tbody class="table-group-divider">
    @foreach ($response as $materia)
        <tr>
            <th scope="row">{{ $numeral++ }}</th>
            <td>{{$materia ->nombre}}</td>
            <td>{{$materia ->descripcion}}</td>
            <td>{{$materia ->duracion}} meses</td>
            <td class="{{ session('tipo') == 1 ? 'd-none' : '' }}"> 
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal-{{ $materia->idMateria }}">
                    <b> <i class="bi bi-pencil-fill text-white"></i></b>
                </button>
                <a type="button" class="btn btn-danger" href="{{ route('materias.delete',$materia->idMateria) }}">
                    <b> <i class="bi bi-trash3-fill"></i>
                </a>
            </td>
        </tr>              
        <x-materias.modal-editar 
        :idMateria="$materia->idMateria" 
        :nombre="$materia->nombre"
        :descripcion="$materia->descripcion"
        :duracion="$materia->duracion"
        ></x-materias.modal-editar>
        
        @endforeach
    </tbody>
</table>
<x-materias.modal-crear></x-materias.modal-crear>

@endsection()


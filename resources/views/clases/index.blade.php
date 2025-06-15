@extends('layout.app')

@section('content')

@php
    $numeral = 1;
@endphp

<h2>Planificacion de contenidos por materia</h2>

<section class="text-end my-2">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearModal">
         <b> <i class="bi bi-plus-circle"></i> Agregar </b>
    </button>
</section>

<table class="table table-secondary table-borderless rounded shadow border border-dark-subtle">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Contenido</th>
      <th scope="col">Duracion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
    <tbody class="table-group-divider">
    
        <tr>
            <th scope="row">1</th>
            <td>Limites</td>
            <td>4 semanas</td>
            <td> 

            </td>
        </tr>              
    </tbody>
</table>

@endsection()


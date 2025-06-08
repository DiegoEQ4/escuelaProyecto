@extends('layout.app')

@section('content')

@php
    $numeral = 1;
    $tipos = [1 => 'Alumno', 2 => 'Profesor', 3 => 'Administrador'];
@endphp
<section class="text-end my-2">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearModal">
         <b> <i class="bi bi-plus-circle"></i> Agregar </b>
    </button>
</section>


<table class="table table-secondary table-borderless rounded shadow border border-dark-subtle">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre de usuario</th>
      <th scope="col">Tipo de usuario</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
    <tbody class="table-group-divider">
    @foreach ($response as $usuario)
        @if ($usuario -> habilitado == 1)
        <tr>
            <th scope="row">{{ $numeral++ }}</th>
            <td>{{$usuario ->nombreUsuario}}</td>
            <td><span>{{ $tipos[$usuario->tipo] ?? 'Desconocido' }}</span></td>
            <td> 
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal">
                    <b> <i class="bi bi-pencil-fill text-white"></i></b>
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#crearModal">
                    <b> <i class="bi bi-trash3-fill"></i>
                </button>
            </td>
        </tr>                       
        @endif
    @endforeach
  </tbody>
</table>

<x-usuarios.modal-crear/>
<x-usuarios.modal-editar/>
@endsection()


@extends('layout.app')

@section('content')

@php
    $numeral = 1;
    $tipos = [1 => 'Alumno', 2 => 'Profesor', 3 => 'Administrador'];
@endphp

<h2>Administración de usuarios</h2>


<section class="text-end my-2">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearModal">
         <b> <i class="bi bi-plus-circle"></i> Agregar </b>
    </button>
</section>


<table class="table table-light table-borderless rounded shadow border border-dark-subtle">
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
        <tr>
            <th scope="row">{{ $numeral++ }}</th>
            <td>{{$usuario ->nombreUsuario}}</td>
            <td><span>{{ $tipos[$usuario->tipo] ?? 'Desconocido' }}</span></td>
            <td> 
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal-{{ $usuario->idUsuario }}">
                    <b> <i class="bi bi-pencil-fill text-white"></i></b>
                </button>
                <a type="button" class="btn btn-danger" href="{{ route('usuarios.delete',$usuario ->idUsuario) }}">
                    <b> <i class="bi bi-trash3-fill"></i>
                </a>
            </td>
        </tr>              
        <x-usuarios.modal-editar :idUsuario="$usuario ->idUsuario"></x-usuarios.modal-editar>         
        @endforeach
    </tbody>
</table>

{{-- <x-usuarios.modal-crear></x-usuarios.modal-crear> --}}
<x-usuarios.modal-crear></x-usuarios.modal-crear>
@endsection()


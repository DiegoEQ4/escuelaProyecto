@extends('layout.app')

@section('content')

<h2>Administracion de estudiantes</h2>

<table class="table table-light table-borderless rounded shadow border border-dark-subtle">
    <thead>
    <tr>
      <th scope="col">Carnet</th>
      <th scope="col">Nombre del estudiante </th>
      <th scope="col">Correo</th>
      <th scope="col">Nacimiento</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
    <tbody class="table-group-divider">
    @foreach ($response as $estudiante)
        <tr>
            <th scope="row">{{ $estudiante -> carnet }}</th>
            <td>{{$estudiante ->nombre}} {{$estudiante ->apellido}}</td>
            <td>{{$estudiante ->correo}}</td>
            <td>{{$estudiante ->fechaNacimiento}}</td>
            <td> 
                 <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal-{{ $estudiante->carnet }}">
                    <b> <i class="bi bi-pencil-fill text-white"></i></b>
                </button>
                
                <a type="button" class="btn btn-danger" href="{{ route('estudiantes.delete',$estudiante ->carnet) }}">
                    <b> <i class="bi bi-trash3-fill"></i>   
                </a>
            </td>
        </tr>              
        <x-estudiantes.modal-editar 
        :carnet="$estudiante ->carnet"
        :nombre="$estudiante ->nombre"
        :apellido="$estudiante ->apellido"
        :correo="$estudiante ->correo"
        :nacimiento="$estudiante ->fechaNacimiento"
        ></x-usuarios.modal-editar>         
        @endforeach
    </tbody>
</table>

{{-- <x-usuarios.modal-crear></x-usuarios.modal-crear> --}}
{{-- <x-estudiantes.modal-crear></x-usuarios.modal-crear> --}}
@endsection()


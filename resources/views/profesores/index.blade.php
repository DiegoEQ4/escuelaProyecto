@extends('layout.app')

@section('content')

<h2>Administracion de Profesores</h2>
<div class="table-responsive">
    <table class="table table-light table-borderless rounded shadow border border-dark-subtle">
        <thead>
        <tr>
        <th scope="col">Carnet</th>
        <th scope="col">Nombre del profesor </th>
        <th scope="col">Correo</th>
        <th scope="col">Titulo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Nacimiento</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
        <tbody class="table-group-divider">
        @foreach ($response as $profesor)
            <tr>
                <th scope="row">{{ $profesor -> carnet }}</th>
                <td>{{$profesor ->nombre}} {{$profesor ->apellido}}</td>
                <td>{{$profesor ->correo}}</td>
                <td>{{$profesor ->titulo}}</td>
                <td>{{$profesor ->telefono}}</td>
                <td>{{$profesor ->fechaNacimiento}}</td>
                <td> 
                    <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editarModal-{{ $profesor->carnet }}">
                        <b> <i class="bi bi-pencil-fill text-white"></i></b>
                    </button>
                    
                    <a type="button" class="btn btn-danger m-1" href="{{ route('profesores.delete',$profesor->carnet) }}">
                        <b> <i class="bi bi-trash3-fill"></i>   
                    </a>
                    <a type="button" class="btn btn-primary m-1" href="{{ route('materia_detalle.index',$profesor->carnet) }}">
                        <i class="bi bi-journal-plus"></i>
                    </a>
                </td>
            </tr>              
            <x-profesores.modal-editar 
            :carnet="$profesor->carnet"
            :nombre="$profesor->nombre"
            :apellido="$profesor->apellido"
            :correo="$profesor->correo"
            :nacimiento="$profesor->fechaNacimiento"
            :telefono="$profesor->telefono"
            :titulo="$profesor->titulo"
            ></x-profesores.modal-editar>         
            @endforeach
        </tbody>
    </table>
</div>
@endsection()


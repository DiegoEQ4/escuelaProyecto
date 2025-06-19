@extends('layout.app')

@section('content')

@php
    $numeral = 1;
@endphp
{{-- {{ dd($clases) }} --}}
<h2>Administracion de Asistencias</h2>


@if(session('error'))
    {{ session('error') }}
@endif

<section class="text-left my-2">
    <a type="button" href="{{ route('asistencias.index') }}" class="btn btn-danger">
        <b> <i class="bi bi-arrow-left-circle"></i> Atras </b>
    </a>
</section>

<form method="post" action="{{ route('detalle_asistencia.store') }}">
    @csrf
    <table class="table table-light table-borderless rounded shadow border border-dark-subtle">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Esudiante</th>
        <th scope="col">Estado</th>
        <th scope="col">Observaciones</th>
        </tr>
    </thead>
        <tbody class="table-group-divider">
        @foreach ($detalles as $i => $detalle)        
            <tr>
                <th scope="row">{{ $numeral++ }}</th>
                <td>{{ $detalle -> carnetEstudiante }}</td>
                <td>
                    <select name="detalle[{{ $i }}][estado]" class="form-select" id="">
                        <option value="0"   {{ (int)$detalle->estado === 0 ? 'selected' : '' }} >Indefinido</option>
                        <option value="1" {{ (int)$detalle->estado === 1 ? 'selected' : '' }}>Presente</option>
                        <option value="2" {{ (int)$detalle->estado === 2 ? 'selected' : '' }}>Permiso</option>
                        <option value="3" {{ (int)$detalle->estado === 3 ? '    selected' : '' }}>Ausente</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" name="detalle[{{ $i }}][detalle]" value="{{ $detalle->detalle }}">
                    <input type="hidden" name="detalle[{{ $i }}][idAsistencia]"  value="{{ $detalle->idAsistencia }}">
                    <input type="hidden" name="detalle[{{ $i }}][idDetalleAsistencia]" value="{{ $detalle->idDetalleAsistencia }}">
                </td>
            </tr>              
        @endforeach
        </tbody>
    </table>

    <section class="text-end my-2">
        <button type="submit" class="btn btn-success">
            <b> <i class="bi bi-save"></i> Guardar </b>
        </button>
    </section>
</form>
{{-- <x-asistencias.modal-crear
    :clases="$clases"
></x-asistencias.modal-crear> --}}

@endsection()


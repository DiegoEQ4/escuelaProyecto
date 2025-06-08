@extends('layout.app')

@section('content')

<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <input type="hidden" name="idUsuario" value="1">
    <input type="text" name="nombreUsuario">
    <input type="text" name="contrasena">
    <input type="hidden" name="tipo" value="1">
    <button type="submit">Guardar</button>
    <form action="{{ route('usuarios.update',1) }}" method="POST">
        @csrf
        <button type="submit">editar</button>
    </form>
</form>


<form action="{{ route('usuarios.delete',1) }}" method="POST">
    @csrf
    <button type="submit">borrar</button>
</form>

@endsection()   
<?php
namespace App\Services;

use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class UsuariosServices {

    private $usuarioModel;


    public function __construct() {
        $this->usuarioModel = new Usuarios();
    }
    
    function obtenerTodos()
    {   
        $usuarios = $this -> usuarioModel -> all();
        return $usuarios;
    }


    function crearUsuario(object $request)
    {
        $usuario = new Usuarios();
        $usuario->nombreUsuario = $request->nombreUsuario;
        $usuario->contrasena = $request->contrasena;
        $usuario->tipo = (int)$request->tipo;
        $usuario->save();
        return $usuario;
    }

    function actualizarUsuario(object $request,int $id)
    {
        $usuario = $this->usuarioModel->findOrFail($request->idUsuario);
        $usuario->nombreUsuario = $request->nombreUsuario;      
        $usuario->contrasena = $request->contrasena;
        $usuario->tipo = (int)$request->tipo;
        $usuario->save();
        return $usuario;
    }

    function deshabilitarUsuario(int $id)
    {
        $usuario = $this->usuarioModel->findOrFail($id);
        $usuario->habilitado = 0;
        $usuario->save();
        return 'hecho';
    }


}


?>
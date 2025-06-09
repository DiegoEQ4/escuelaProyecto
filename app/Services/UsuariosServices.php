<?php
namespace App\Services;

use App\Models\Estudiantes;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class UsuariosServices {

    private $usuarioModel;
    private $estudianteServices;


    public function __construct() {
        $this->usuarioModel = new Usuarios();
        $this->estudianteServices = new EstudiantesServices();
    }
    
    function obtenerTodos()
    {   
        $usuarios = $this -> usuarioModel -> where('habilitado',1)->get();
        return $usuarios;
    }


    function crearUsuario(object $request)
    {
        $usuario = new Usuarios();
        $usuario->nombreUsuario = $request->nombreUsuario;
        $usuario->contrasena = $request->contrasena;
        $usuario->tipo = (int)$request->tipo;
        $usuario->save();
        
        $idUsuario = $usuario -> idUsuario;
        
        if($usuario -> tipo == 1){
            $estudiante = [
                "carnet"=> $request -> carnet,
                "nombre"=> $request -> nombre,
                "apellido"=> $request -> apellido,
                "correo"=> $request -> correo,
                "fechaNacimiento"=> $request -> fechaNacimiento,
                "idUsuario"=>  $idUsuario ,
            ];
            $this -> estudianteServices -> crearEstudiante($estudiante);
            return $estudiante;
        }
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
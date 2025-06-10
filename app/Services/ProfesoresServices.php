<?php
namespace App\Services;

use App\Models\Profesores;
use Illuminate\Support\Facades\Hash;

class ProfesoresServices {

    private $profesorModel;


    public function __construct() {
        $this->profesorModel = new Profesores();
    }
    
    function obtenerTodos()
    {   
        $profesores = $this -> profesorModel -> all();
        return $profesores;
    }


    function crearProfesor($request)
    {
        $profesor = new Profesores();
        $profesor -> carnet = $request["carnet"];
        $profesor -> nombre = $request["nombre"];
        $profesor -> apellido = $request["apellido"];
        $profesor -> correo = $request["correo"];
        $profesor -> titulo = $request["titulo"];
        $profesor -> telefono = $request["telefono"];
        $profesor -> fechaNacimiento = $request["fechaNacimiento"];
        $profesor -> idUsuario = $request["idUsuario"];
        $profesor->save();
        return $profesor;
    }

    function actualizarEstudiante(object $request,int $id)
    {
        $usuario = $this->profesorModel->findOrFail($request->idUsuario);

        $usuario->save();
        return $usuario;
    }

    function deshabilitarUsuario(int $id)
    {
        $usuario = $this->profesorModel->findOrFail($id);
        $usuario->habilitado = 0;   
        $usuario->save();
        return 'hecho';
    }



}


?>
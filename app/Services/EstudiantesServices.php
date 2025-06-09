<?php
namespace App\Services;

use App\Models\Estudiantes;
use Illuminate\Support\Facades\Hash;

class EstudiantesServices {

    private $estudianteModel;


    public function __construct() {
        $this->estudianteModel = new Estudiantes();
    }
    
    function obtenerTodos()
    {   
        $estudiantes = $this -> estudianteModel -> all();
        return $estudiantes;
    }


    function crearEstudiante($request)
    {
        $estudiante = new Estudiantes();
        $estudiante -> carnet = $request["carnet"];
        $estudiante -> nombre = $request["nombre"];
        $estudiante -> apellido = $request["apellido"];
        $estudiante -> correo = $request["correo"];
        $estudiante -> fechaNacimiento = $request["fechaNacimiento"];
        $estudiante -> idUsuario = $request["idUsuario"];
        $estudiante->save();
        return $estudiante;
    }

    function actualizarEstudiante(object $request,int $id)
    {
        $usuario = $this->estudianteModel->findOrFail($request->idUsuario);

        $usuario->save();
        return $usuario;
    }

    function deshabilitarUsuario(int $id)
    {
        $usuario = $this->estudianteModel->findOrFail($id);
        $usuario->habilitado = 0;   
        $usuario->save();
        return 'hecho';
    }



}


?>
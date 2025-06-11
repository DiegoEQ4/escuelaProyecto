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
        $estudiantes = $this -> estudianteModel -> where('habilitado',1)->get();
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

    function actualizarEstudiante(object $request)
    {
        $estudiante = $this->estudianteModel->findOrFail($request->carnet);
        $estudiante -> nombre = $request -> nombre;
        $estudiante -> apellido = $request -> apellido;
        $estudiante -> correo = $request -> correo;
        $estudiante -> fechaNacimiento = $request -> fechaNacimiento;
        $estudiante->save();
        return $estudiante;
    }

    function deshabilitarEstudiante(int $id)
    {
        $estudiante = $this->estudianteModel->findOrFail($id);
        $estudiante->habilitado = 0;   
        $estudiante->save();
        return 'hecho';
    }



}


?>
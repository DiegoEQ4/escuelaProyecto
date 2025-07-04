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

    function obtenerEstudiantesSinGrados()
    {   
        $estudiantes = $this -> estudianteModel -> where('habilitado',1)->where('idGrado',null)->get();
        return $estudiantes;
    }

    function crearEstudiante($request)
    {
        try {
            $estudiante = new Estudiantes();
            $estudiante -> carnet = $request["carnet"];
            $estudiante -> nombre = $request["nombre"];
            $estudiante -> apellido = $request["apellido"];
            $estudiante -> correo = $request["correo"];
            $estudiante -> fechaNacimiento = $request["fechaNacimiento"];
            $estudiante -> idUsuario = $request["idUsuario"];
            $estudiante->save();
            session()->flash('success', 'Registro guardado correctamente');
            return $estudiante;
        } catch (\Throwable $th) {
            session()->flash('error', 'Error inesperado: ' . $th->getMessage());
            return redirect()->back();
        }

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

    function obtenerEstudiantePorGrado(int $idGrado ){
        $estudiantes = $this -> estudianteModel -> where('idGrado',$idGrado)-> where('habilitado',1)->get();
        return $estudiantes;
    }

    function asignacionGrado($request){
        $estudiante = $this->estudianteModel->findOrFail($request->carnet);
        $estudiante -> idGrado = $request -> idGrado;
        $estudiante->save();
        return $estudiante;
    }

    function desvnicularGrado(int $carnet){
        $estudiante = $this->estudianteModel->findOrFail($carnet);
        $estudiante -> idGrado = null;
        $estudiante->save();
        return $estudiante;
    }


}


?>
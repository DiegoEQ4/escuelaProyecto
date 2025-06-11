<?php
namespace App\Services;

use App\Models\Materias;
use Illuminate\Support\Facades\Hash;

class MateriasServices {

    private $materiasModel;


    public function __construct() {
        $this->materiasModel = new Materias();
    }
    
    function obtenerTodos()
    {   
        $materias = $this -> materiasModel -> where('habilitado',1)->get();
        return $materias;
    }


    function crearMateria(object $request)
    {
        $materia = new Materias();
        $materia->nombre = $request->nombre;
        $materia->duracion = (int)$request->duracion;
        $materia->descripcion = $request->descripcion;
        $materia->save();
        return $materia;
    }

    function actualizarMateria(object $request)
    {
        $materia = $this->materiasModel->findOrFail($request->idMateria);
        $materia->nombre = $request->nombre;
        $materia->duracion = (int)$request->duracion;
        $materia->descripcion = $request->descripcion;
        $materia->save();
        return $materia;
    }

    function deshabilitarMateria(int $id)
    {
        $materia = $this->materiasModel->findOrFail($id);
        $materia->habilitado = 0;
        $materia->save();
        return 'hecho';
    }

}


?>
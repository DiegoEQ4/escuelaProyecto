<?php
namespace App\Services;

use App\Models\Materia_Detalle;
use Illuminate\Support\Facades\Hash;

class MateriaDetalleService {

    private $materiaDetalle;


    public function __construct() {
        $this->materiaDetalle = new Materia_Detalle();
    }
    
    function obtenerTodos()
    {   
        $materias = $this -> materiaDetalle
        ->from('materia_detalle as md') 
        ->join('profesores as p', 'md.carnetProfesor', '=', 'p.carnet')
        ->join('materias as m', 'md.idMateria', '=', 'm.idMateria')
        ->join('grados as g', 'md.idGrado', '=', 'g.idGrado')
        ->select(
            'md.idMateriaDetalle',
            'm.nombre as nombre_materia',
            'p.nombre as nombre_profesor',
            'g.nombre as nombre_grado'
        )
        ->get();
        return $materias;
    }


    // function crearGrado($request)
    // {
    //     $grados = new Grados();
    //     $grados -> nombre = $request -> nombre;
    //     $grados -> seccion = $request -> seccion;
    //     $grados -> cupos = (int)$request-> cupos;
    //     $grados -> orden = (int)$request-> orden;
    //     $grados -> tiempo = (int)$request-> tiempo;
    //     $grados->save();
    //     return $grados;
    // }

    // function actualizarGrados(object $request)
    // {
    //     $grados = $this->gradosModel->findOrFail($request->idUsuario);
    //     $grados -> nombre = $request -> nombre;
    //     $grados -> seccion = $request -> seccion;
    //     $grados -> cupos = (int)$request-> cupos;
    //     $grados -> orden = (int)$request-> orden;
    //     $grados -> tiempo = (int)$request-> tiempo;

    //     $grados->save();
    //     return $grados;
    // }

    // function deshabilitarGrados(int $id)
    // {
    //     $grados = $this->gradosModel->findOrFail($id);
    //     $grados->habilitado = 0;   
    //     $grados->save();
    //     return 'hecho';
    // }



}


?>
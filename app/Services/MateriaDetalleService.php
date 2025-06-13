<?php
namespace App\Services;

use App\Models\Materia_Detalle;
use Illuminate\Support\Facades\Hash;

class MateriaDetalleService {

    private $materiaDetalle;
    private $gradoServices;
    private $materiaService;

    public function __construct() {
        $this->materiaDetalle = new Materia_Detalle();
        $this->gradoServices = new GradosServices;
        $this->materiaService = new MateriasServices;
    }
    
    function obtenerTodos(int $carnet)
    {   
        $grado = $this-> gradoServices -> obtenerTodos();
        $materia = $this-> materiaService -> obtenerTodos();

        $detalle = $this -> materiaDetalle
        ->from('materia_detalle as md') 
        ->join('profesores as p', 'md.carnetProfesor', '=', 'p.carnet')
        ->join('materias as m', 'md.idMateria', '=', 'm.idMateria')
        ->join('grados as g', 'md.idGrado', '=', 'g.idGrado')
        ->select(
            'md.idMateriaDetalle',
            'm.nombre as nombre_materia',
            'p.nombre as nombre_profesor',
            'p.apellido as apellido_profesor',
            'g.nombre as nombre_grado',
            'g.seccion as seccion_grado'
        )
        ->where('md.carnetProfesor',$carnet)
        ->where('md.habilitado',1)
        ->get();
        return [
            "detalle" => $detalle,
            "grado" => $grado,
            "materia" => $materia
        ];
    }


    function asignarGrado($request)
    {
        $detalle = new Materia_Detalle();
        $detalle -> idGrado = $request -> idGrado;
        $detalle -> idMateria = $request -> idMateria;
        $detalle -> carnetProfesor = $request -> carnetProfesor;
        $detalle->save();
        return $detalle;
    }

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

    function deshabilitarDetalle(int $id)
    {
        $detalle = $this->materiaDetalle->findOrFail($id);
        $detalle->habilitado = 0;   
        $detalle->save();
        return 'hecho';
    }



}


?>
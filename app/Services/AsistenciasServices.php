<?php

namespace App\Services;

use App\Models\Asistencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AsistenciasServices {

    private $asistenciasModel;
    public function __construct() {
        $this->asistenciasModel = new Asistencias();
    }   
    

    function obtenerTodo(){
        $asistencias = $this -> asistenciasModel -> where('habilitado',1)->get();
        return $asistencias;
    }
    function obtenerAsitenciaxGrado(){

        $asistencias = $this -> asistenciasModel   ->from('asistencias as a') 
        ->join('clases as c', 'c.idClase', '=', 'a.clase')
        ->join('materia_detalle as md', 'md.idMateria', '=', 'c.idMateriaDetalle')
        ->join('materias as m', 'm.idMateria', '=', 'md.idMateria')
        ->join('grados as g', 'md.idGrado', '=', 'g.idGrado')
        ->select(
            'a.idAsistencia',
            'c.contenidoClase',
            'm.nombre as nombre_materia',
            'c.duracion',
            'g.nombre',
            'a.fechaInicio',
            'a.fechaFinal',
        )
        // ->where('md.carnetProfesor',$carnet)
        ->where('a.habilitado',1)
        ->get();

        return $asistencias;
    }





}
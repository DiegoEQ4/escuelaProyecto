<?php

namespace App\Services;

use App\Models\Asistencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AsistenciasServices {

    private $asistenciasModel;
    private $gradoServices;
    private $detalleAsistenciaServices;
    public function __construct() {
        $this->asistenciasModel = new Asistencias();
        $this->gradoServices = new GradosServices();
        $this->detalleAsistenciaServices = new DetalleAsistenciasService();
    }   
    

    function obtenerTodo(){
        $asistencias = $this -> asistenciasModel -> where('habilitado',1)->get();
        return $asistencias;
    }

    function obtenerAsitenciaxGrado(){
        $asistencias = $this -> asistenciasModel   ->from('asistencias as a') 
        ->join('clases as c', 'c.idClase', '=', 'a.clase')
        ->join('materia_detalle as md', 'md.idMateriaDetalle', '=', 'c.idMateriaDetalle')
        ->join('materias as m', 'm.idMateria', '=', 'md.idMateria')
        ->join('grados as g', 'md.idGrado', '=', 'g.idGrado')
        ->select(
            'a.idAsistencia',
            'c.contenidoClase',
            'm.nombre as nombre_materia',
            'c.duracion',
            'g.idGrado',
            'g.nombre',
            'a.fechaInicio',
            'a.fechaFinal',
            )
        ->where('a.habilitado',1)
        ->get();
        return $asistencias;
    }
    
    function crearAsistencia($request){
        try {
            $asistencia = new Asistencias();
            $asistencia -> clase = (int) $request -> clase;
            $asistencia -> fechaInicio = $request -> fechaInicio;
            $asistencia -> fechaFinal = $request -> fechaFinal;

            $asistencia -> save();

            if($asistencia){
                $grado = $this->gradoServices->obtenerGradoxClase($request->clase);
                $estudiantes = $this->detalleAsistenciaServices->crearDetalle((int)$grado->idGrado,$asistencia->idAsistencia);
            }
        } catch (\Throwable $th) {
            throw $th;
        }



        return $estudiantes;
    }




}
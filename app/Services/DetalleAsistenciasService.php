<?php

namespace App\Services;

use App\Models\Asistencias;
use App\Models\Detalle_Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DetalleAsistenciasService {

    private $detalleAsistenciaModel;
    private $estudiantesServices;
    public function __construct() {
        $this->detalleAsistenciaModel = new Detalle_Asistencia();
        $this->estudiantesServices = new EstudiantesServices();
    }
    
    
    function obtenerDetalle(int $idAsistencia){
        $detalle = $this->detalleAsistenciaModel
        ->where('idAsistencia', $idAsistencia)
        ->where('habilitado', 1)
        ->get();
        return $detalle;
    }
    
    function crearDetalle(int $grado, int $idAsistencia){

        $estudiantes = $this->estudiantesServices->obtenerEstudiantePorGrado($grado);
        foreach($estudiantes as $estudiante){
            $detalleAsistencia = new Detalle_Asistencia();
            $detalleAsistencia -> carnetEstudiante = $estudiante -> carnet;
            $detalleAsistencia -> estado = 0;
            $detalleAsistencia -> detalle = 'Inserta una observacion';
            $detalleAsistencia -> idAsistencia = $idAsistencia;
            $detalleAsistencia -> save();
        }
        return $detalleAsistencia;
    }


    function estadoAsistencia($request){

        foreach($request->detalle as $detalle){
            $detalleAsistencia = $this->detalleAsistenciaModel->findOrFail($detalle['idDetalleAsistencia']);
            $detalleAsistencia->estado = (int)$detalle['estado'];
            $detalleAsistencia->detalle = $detalle['detalle'];
            // $detalleAsistencia->idAsistencia = $detalle->idAsistencia;
            $detalleAsistencia->save();
        }
        return $detalleAsistencia;
    }


}
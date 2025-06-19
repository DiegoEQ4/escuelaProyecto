<?php

namespace App\Http\Controllers;

use App\Services\DetalleAsistenciasService;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    private $asistenciaService;
    public function __construct(DetalleAsistenciasService $detalleAsistencia) {

        $this->asistenciaService = $detalleAsistencia;
        
    }

    function reporteAsistencia($id){
        $detalles = $this->asistenciaService->obtenerDetalle($id);
        $pdf = FacadePdf::loadView('detalle_asistencia.reporte',compact('detalles'));
        
        return $pdf ->stream('asistencias.pdf');
        
    }
}

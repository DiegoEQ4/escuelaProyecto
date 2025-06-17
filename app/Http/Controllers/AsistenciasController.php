<?php

namespace App\Http\Controllers;

use App\Models\Asistencias;
use App\Services\AsistenciasServices;
use App\Services\ClasesServices;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
{

    public $service;
    public $serviceClases;

    public function __construct(AsistenciasServices $asistenciasServices, ClasesServices $clasesServices) {
        $this->service = $asistenciasServices;
        $this->serviceClases = $clasesServices;
    }

    //
    function index(){
        $asistencias = $this->service->obtenerAsitenciaxGrado(); 
        $clasesSinAsistencia = $this->serviceClases->clasesSinAsistencia(); 
        return(view('asistencias.index',[
            'asistencias' => $asistencias,
            'clases' => $clasesSinAsistencia
        ])); 
        return $clasesSinAsistencia;
    }

    function store(Request $request){

        return $asistencias = $this->service->crearAsistencia($request); 


    }
}

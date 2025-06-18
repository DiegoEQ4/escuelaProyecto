<?php

namespace App\Http\Controllers;

use App\Services\DetalleAsistenciasService;
use Illuminate\Http\Request;

class DetalleAsistenciaController extends Controller
{
    //
    public $service;
    public function __construct(DetalleAsistenciasService $detalleAsistenciasService) {
        $this->service = $detalleAsistenciasService;
    }

    function index(int $id){
        $detalles = $this->service->obtenerDetalle((int)$id);
        // return $detalles;

        return(view('detalle_asistencia.index',[
        'detalles' => $detalles
        ]));
    }


    function store(Request $request){

        $response = $this->service->estadoAsistencia($request);
        return back();
    }
}

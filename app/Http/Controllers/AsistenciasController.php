<?php

namespace App\Http\Controllers;

use App\Services\AsistenciasServices;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
{

    public $service;

    public function __construct(AsistenciasServices $asistenciasServices) {
        $this->service = $asistenciasServices;
    }

    //
    function index(){
        return $asistencias = $this->service->obtenerTodo(); 
    }
}

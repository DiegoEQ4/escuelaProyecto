<?php

namespace App\Http\Controllers;

use App\Services\MateriaDetalleService;
use Illuminate\Http\Request;

class MateriaDetalleController extends Controller
{
    public $service;

    public function __construct(MateriaDetalleService $materiaDetalleServices) {
        $this->service = $materiaDetalleServices;
    }

    //
    function index(){
        $response = $this->service-> obtenerTodos();
        return(view('materia_detalle.index',[
        'response' => $response
        ]));
    }
}

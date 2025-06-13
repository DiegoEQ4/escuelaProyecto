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
    function index(int $carnet){
        $response = $this->service-> obtenerTodos($carnet);
        return(view('materia_detalle.index',[
        'response' => $response
        ]));
    }
    function store(Request $request){
        $response = $this->service-> asignarGrado($request);
        return back();
    }
    function delete(int $id){
        $response = $this->service-> deshabilitarDetalle($id);
        return back();
    }
}

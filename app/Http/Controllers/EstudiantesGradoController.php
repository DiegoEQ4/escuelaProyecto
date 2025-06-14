<?php

namespace App\Http\Controllers;

use App\Services\EstudiantesServices;
use Illuminate\Http\Request;

class EstudiantesGradoController extends Controller
{
    public $service;

    public function __construct(EstudiantesServices $estudiantesServices) {
    $this->service = $estudiantesServices;
    }


    function index(int $idGrado){
        $response = $this ->service -> obtenerEstudiantePorGrado($idGrado);
        $estudiantes = $this ->service -> obtenerEstudiantesSinGrados();
        return(view('estudiantes_grados.index',[
            "response"=> $response,
            "estudiantes" => $estudiantes
        ]));
    }
    function store(Request $request){
        $response = $this ->service -> asignacionGrado($request);
        return back();
    }

    function delete(int $carnet){
        $response = $this ->service -> desvnicularGrado($carnet);
        return back();
    }
}

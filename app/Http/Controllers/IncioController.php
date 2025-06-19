<?php

namespace App\Http\Controllers;

use App\Services\GradosServices;
use App\Services\MateriasServices;
use Illuminate\Http\Request;

class IncioController extends Controller
{
    //

    private $gradosService;
    private $materiasService;
    public function __construct() {
        $this->gradosService = new GradosServices ();
        $this->materiasService = new MateriasServices();
    }


    function index(){

        $grados = $this->gradosService->obtenerTodos();
        $materias = $this->materiasService->obtenerTodos();

        return(view('welcome',[
            'grados'=>$grados,
            'materias'=>$materias,
        ]));
    }

}

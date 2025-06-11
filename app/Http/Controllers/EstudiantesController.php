<?php

namespace App\Http\Controllers;

use App\Services\EstudiantesServices;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public $service;

    public function __construct(EstudiantesServices $estudiantesServices) {
    $this->service = $estudiantesServices;
    }

    //
    function index(){
        $response = $this->service-> obtenerTodos();
        return(view('estudiantes.index',[
        'response' => $response
        ]));
    }
    function update(Request $request){
        $response = $this->service-> actualizarEstudiante($request);
        return back();
    }
    function delete(int $id){
        $response = $this->service-> deshabilitarEstudiante($id);
        return back();
    }
    
}

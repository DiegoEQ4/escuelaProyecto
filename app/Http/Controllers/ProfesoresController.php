<?php

namespace App\Http\Controllers;

use App\Services\ProfesoresServices;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    public $service;

    public function __construct(ProfesoresServices $profesoresServices) {
    $this->service = $profesoresServices;
    }

    //
    function index(){
        $response = $this->service-> obtenerTodos();
        return(view('profesores.index',[
        'response' => $response
        ]));
    }
    function update(Request $request){

        $response = $this->service-> actualizarEstudiante($request);
        return back();
    }
    function delete(int $id){

        $response = $this->service-> deshabilitarUsuario($id);
        return back();
    }
}

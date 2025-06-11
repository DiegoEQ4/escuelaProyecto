<?php

namespace App\Http\Controllers;

use App\Services\MateriasServices;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public $service;

    public function __construct(MateriasServices $materiasServices) {
        $this->service = $materiasServices;
    }

    //
    function index(){
        $response = $this->service-> obtenerTodos();
        return(view('materias.index',[
        'response' => $response
        ]));
    }

    function store(Request $request){
        $response = $this->service-> crearMateria($request);
        //return $response;
        return back();
    }
    function update(Request $request){
        $response = $this->service-> actualizarMateria($request);
        // return $response;
        return back();
    }

    function delete(int $id){
    $response = $this->service-> deshabilitarMateria($id);
    // return $response;
    return back();
    }

}

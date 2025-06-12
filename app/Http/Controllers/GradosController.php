<?php

namespace App\Http\Controllers;

use App\Services\GradosServices;
use Illuminate\Http\Request;

class GradosController extends Controller
{

    public $service;

    public function __construct(GradosServices $gradosServices) {
        $this->service = $gradosServices;
    }

    //
    function index(){
        $response = $this->service-> obtenerTodos();
        return(view('grados.index',[
        'response' => $response
        ]));
    }
    function store(Request $request){
        $response = $this->service-> crearGrado($request);
        return back();
    }
    function update(Request $request){
        $response = $this->service-> actualizarGrados($request);
        return back();
    }
    function delete(int $id){
        $response = $this->service-> deshabilitarGrados($id);
        return back();
    }
}

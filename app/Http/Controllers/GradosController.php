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
}

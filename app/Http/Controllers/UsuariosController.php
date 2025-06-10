<?php

namespace App\Http\Controllers;

use App\Services\UsuariosServices;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public $service;

    public function __construct(UsuariosServices $usuarioServices) {
        $this->service = $usuarioServices;
    }

    //
    function index(){

        $response = $this->service-> obtenerTodos();

        return(view('usuarios.index',[
        'response' => $response
        ]));
    }



    function store(Request $request){
        
        $response = $this->service-> crearUsuario($request);
        return back();

    }
    function update(Request $request,$id){

        $response = $this->service-> actualizarUsuario($request,$id);
        //return $response;
        return back();
    } 
    function delete(Request $request,int $id){
        $response = $this->service-> deshabilitarUsuario($id);
        // return $response;
        return back();

        
    }   
}

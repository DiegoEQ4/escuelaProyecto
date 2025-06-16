<?php

namespace App\Services;

use App\Models\Asistencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AsistenciasServices {

    private $asistenciasModel;
    public function __construct() {
        $this->asistenciasModel = new Asistencias();
    }
    

    function obtenerTodo(){
        $asistencias = $this -> asistenciasModel -> where('habilitado',1)->get();
        return $asistencias;
    }





}
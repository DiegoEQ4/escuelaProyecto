<?php
namespace App\Services;

use App\Models\Grados;
use Illuminate\Support\Facades\Hash;

class GradosServices {

    private $gradosModel;


    public function __construct() {
        $this->gradosModel = new Grados();
    }
    
    function obtenerTodos()
    {   
        $grados = $this -> gradosModel -> where('habilitado',1)->get();
        return $grados;
    }


    function crearGrado($request)
    {
        $grados = new Grados();
        $grados -> nombre = $request -> nombre;
        $grados -> seccion = $request -> seccion;
        $grados -> cupos = (int)$request-> cupos;
        $grados -> orden = (int)$request-> orden;
        $grados -> tiempo = (int)$request-> tiempo;
        $grados->save();
        return $grados;
    }

    function actualizarGrados(object $request)
    {
        $grados = $this->gradosModel->findOrFail($request->idUsuario);
        $grados -> nombre = $request -> nombre;
        $grados -> seccion = $request -> seccion;
        $grados -> cupos = (int)$request-> cupos;
        $grados -> orden = (int)$request-> orden;
        $grados -> tiempo = (int)$request-> tiempo;

        $grados->save();
        return $grados;
    }

    function deshabilitarGrados(int $id)
    {
        $grados = $this->gradosModel->findOrFail($id);
        $grados->habilitado = 0;   
        $grados->save();
        return 'hecho';
    }



}


?>
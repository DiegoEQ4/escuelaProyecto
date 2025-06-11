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
        $grados = $this -> gradosModel -> all();
        return $grados;
    }


    function crearGrado($request)
    {
        $grados = new Grados();
        $grados -> nombre = $request -> nombre;
        $grados -> seccion = $request -> seccion;
        $grados -> cupos = (int)$request-> cupos;
        $grados -> tiempo = (int)$request-> tiempo;
        $grados->save();
        return $grados;
    }

    // function actualizarEstudiante(object $request,int $id)
    // {
    //     $usuario = $this->estudianteModel->findOrFail($request->idUsuario);

    //     $usuario->save();
    //     return $usuario;
    // }

    // function deshabilitarUsuario(int $id)
    // {
    //     $usuario = $this->estudianteModel->findOrFail($id);
    //     $usuario->habilitado = 0;   
    //     $usuario->save();
    //     return 'hecho';
    // }



}


?>
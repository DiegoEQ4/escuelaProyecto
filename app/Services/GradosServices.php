<?php
namespace App\Services;

use App\Models\Clases;
use App\Models\Grados;
use Illuminate\Support\Facades\Hash;

class GradosServices {

    private $gradosModel;
    private $clasesModel;


    public function __construct() {
        $this->gradosModel = new Grados();
        $this->clasesModel = new Clases();
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

    function obtenerGradoxClase(int $clase){
        $grado = $this->clasesModel-> from('clases as c')
        ->join('materia_detalle as md','c.idMateriaDetalle' ,'=','md.idMateriaDetalle')
        ->join('grados as g','md.idGrado' ,'=','g.idGrado')
        // ->join('grado as g','md.idGrado' ,'=','g.idGrado')
        ->select(
            'g.idGrado'
        )
        ->where('c.idClase', $clase)    
        ->where('g.habilitado', 1)
        ->first();

        return $grado;
    } 

}


?>
<?php
namespace App\Services;

use App\Models\Clases;
use Illuminate\Support\Facades\Hash;

class ClasesServices {

    private $clasesModel;


    public function __construct() {
        $this->clasesModel = new Clases();
    }
    
    function obtenerTodo()
    {   
        $clases = $this -> clasesModel -> where('habilitado',1)->get();
        return $clases;
    }

    function obtenerPorDetlle($request)
    {   
        $clases = $this -> clasesModel -> where('idMateriaDetalle',$request )->where('habilitado',1)->paginate(3);
        return $clases;
    }
    function crearClase($request)
    {   
        $clases  = new Clases();
        $clases -> contenidoClase = $request -> contenido;
        $clases -> duracion = $request -> duracion;
        $clases -> idMateriaDetalle = $request -> detalle_materia;
        $clases->save();
        return $clases;
    }

    function deshabilitarClases(int $id)
    {
        $clases = $this->clasesModel->findOrFail($id);
        $clases->habilitado = 0;   
        $clases->save();
        return 'hecho';
    }

}
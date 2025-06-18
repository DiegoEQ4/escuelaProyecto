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
    function clasesSinAsistencia()
    {
        $clasesSinAsistencia = $this->clasesModel->from('clases as c') 
        ->join('materia_detalle as md', 'md.idMateriaDetalle', '=', 'c.idMateriaDetalle')
        ->join('materias as m', 'm.idMateria', '=', 'md.idMateria')
        ->join('grados as g', 'g.idGrado', '=', 'md.idGrado')
        ->select(
            'c.idClase',
            'c.contenidoClase',
            'm.nombre as nombre_materia',
            'c.duracion',
            'g.nombre as nombre_grado',
            'g.seccion',
        )
        ->whereNotIn('idClase', function($query) {
            $query->select('clase')->from('asistencias');
        })
        ->where('c.habilitado',1)
        ->get();
        return $clasesSinAsistencia;
    }

}
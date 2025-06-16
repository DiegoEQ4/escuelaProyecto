<?php
namespace App\Services;

use App\Models\Clases;
use Illuminate\Support\Facades\Hash;

class ClasesServices {

    private $clasesModel;
    public function __construct() {
        $this->clasesModel = new Clases();
    }
    
    function obtenerTodos()
    {   
        $clases = $this -> clasesModel -> where('habilitado',1)->get();
        return $clases;
    }

}
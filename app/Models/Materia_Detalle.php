<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia_Detalle extends Model
{
    //
    public $incrementing = true;
    protected $table = 'materia_detalle'; 
    protected $primaryKey = 'idMateriaDetalle'; 
    protected $fillable = [
        'idGrado',
        'idMateria',
        'carnetProfesor',
    ];
    
    protected $attributes = [
        'habilitado' => 1,
    ];
    
    public $timestamps = true;
}

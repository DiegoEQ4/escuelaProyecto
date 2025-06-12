<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    //
        //
    public $incrementing = true;
    protected $table = 'materias'; 
    protected $primaryKey = 'idMateria'; 
    protected $fillable = [
        'nombre',
        'duracion',//MESES
        'descripcion',
    ];
    
    protected $attributes = [
        'habilitado' => 1,
    ];
    
    public $timestamps = true;

}

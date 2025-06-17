<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    //
    public $incrementing = true;
    protected $table = 'clases'; 
    protected $primaryKey = 'idClase'; 
    protected $fillable = [
        'contenidoClase',
        'duracion',
        'idMateriaDetalle',
    ];
    
    protected $attributes = [
        'habilitado' => 1,
    ];
    
    public $timestamps = true;

}

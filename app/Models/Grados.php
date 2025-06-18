<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grados extends Model
{
    public $incrementing = false;
    protected $table = 'grados'; 
    protected $primaryKey = 'idGrado'; 
    protected $fillable = [
        'nombre',
        'seccion',
        'cupos',
        'orden',
        'tiempo'
    ];
    
    protected $attributes = [
        'habilitado' => 1,
    ];
    
    public $timestamps = true;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencias extends Model
{
    //
    public $incrementing = true; 
    protected $table = 'asistencias'; 
    protected $primaryKey = 'idAsistencias'; 
    protected $fillable = [
        'fechaInicio',
        'fechaFinal',
        'clase',
    ];
    
    protected $attributes = [
        'habilitado' => 1,
    ];
    
    public $timestamps = true;

}

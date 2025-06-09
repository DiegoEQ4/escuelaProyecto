<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    //    
    public $incrementing = false;
    protected $table = 'estudiantes'; 
    protected $primaryKey = 'carnet'; 
    protected $fillable = [
        'carnet',
        'nombre',
        'apellido',
        'correo',
        'fechaNacimiento',
        'idGrado',
        'idUsuario',
    ];
    
    protected $attributes = [
        'habilitado' => 1,
    ];
    
    public $timestamps = true;
}

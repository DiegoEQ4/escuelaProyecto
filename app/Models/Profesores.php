<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    //
    public $incrementing = false;
    protected $table = 'profesores'; 
    protected $primaryKey = 'carnet'; 
    protected $fillable = [
        'carnet',
        'nombre',
        'apellido',
        'correo',
        'fechaNacimiento',
        'telefono',
        'titulo',
        'idGrado',
        'idUsuario',
    ];
    
    protected $attributes = [
        'habilitado' => 1,
    ];
    
    public $timestamps = true;
}

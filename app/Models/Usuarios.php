<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    //
    public $incrementing = true;
    protected $table = 'usuarios'; 
    protected $primaryKey = 'idUsuario'; 
    protected $fillable = [
        'nombreUsuario',
        'contrasena',
        'token',
        'tipo',
    ];
    
    protected $attributes = [
        'habilitado' => 1,
    ];
    
    public $timestamps = true;


}

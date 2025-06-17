<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use Notifiable;
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


    public function getAuthPassword() {
    return $this->contrasena;
    }

}

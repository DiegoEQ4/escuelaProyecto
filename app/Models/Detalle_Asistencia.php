<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Asistencia extends Model
{
    //
    public $incrementing = true; 
    protected $table = 'detalle_asistencia'; 
    protected $primaryKey = 'idDetalleAsistencia'; 
    protected $fillable = [
        'carnetEstudiante',
        'idAsistencia',
        'estado', //0 INDEFINIDO || 1 PRESENTE || 2 PERMISO || 3 AUSENTE
    ];
    
    protected $attributes = [
        'habilitado' => 1,
    ];
    
    public $timestamps = true;
}

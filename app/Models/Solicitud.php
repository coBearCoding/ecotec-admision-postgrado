<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';
    public $timestamps = false;
    protected $fillable = [
      'postulante_id',
      'cod_solicitud',
      'estado_id',
      'motivo_aplicar',
      'forma_aplicar',
      'servicio_id',
      'migrado'
  ];
}

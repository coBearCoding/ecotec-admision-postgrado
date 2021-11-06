<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudEvaluacion extends Model
{
   protected $table = 'solicitud_evaluacion';
   public $timestamps = true;
   protected $fillable = [
     'solicitud_id',
     'evaluacion_id',
     'calificacion',
     'puntaje',
     'estado',
     'created_at',
     'updated_at'];
}

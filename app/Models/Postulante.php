<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $table = 'postulante';
    public $timestamps = false;
    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'sexo',
        'estado_civil',
        'discapacidad',
        'tipo_discapacidad',
        'porcentaje_discapacidad',
        'direccion',
        'provincia',
        'canton',
        'telefono',
        'celular',
        'etnia',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'tiktok',
        'codigo_alumno',
        'url_documento',
        'tiktok',
        'nivel_primario',
        'pais_nacionalidad',
        'pais_residencia',
        'nacionalidad',
        'financiamiento_tipo',
        'financiamiento_banco',
        'conadis'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulanteFamiliares extends Model
{
    protected $table = 'postulante_familiares';
    public $timestamps = false;
    protected $fillable = ['postulante_id',
                           'nombre_padre',
                           'apellido_padre',
                           'email_padre',
                           'telefono_padre',
                           'empresa_padre',
                           'cargo_padre',
                           'direccion_padre',
                           'nivel_educacion_padre',
                           'nombre_madre',
                           'apellido_madre',
                           'email_madre',
                           'telefono_madre',
                           'empresa_madre',
                           'cargo_madre',
                           'direccion_madre',
                           'nivel_educacion_madre',
                           'cantidad_hermanos',
                           'edad_hermanos',
                           'emergencia',
                           'celular',
                           'tipo_parentesco1',
                           'nombre_parentesco1',
                           'apellido_parentesco1',
                           'telefono_parentesco1',
                           'tipo_parentesco2',
                           'nombre_parentesco2',
                           'apellido_parentesco2',
                           'telefono_parentesco2',
                           'tipo_parentesco3',
                           'nombre_parentesco3',
                           'apellido_parentesco3',
                           'telefono_parentesco3'];
}

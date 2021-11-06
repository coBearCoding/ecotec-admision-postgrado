<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulanteCarreras extends Model
{
    protected $table = 'postulante_carreras';
    public $timestamps = false;
    protected $fillable = ['facultad_id',
                           'facultad_nombre',
                           'carrera_id',
                           'carrera_nombre',
                           'enfasis_id',
                           'enfasis_nombre',
                           'modalidad_id',
                           'modalidad_nombre',
                           'enteraste',
                           'porque_estudiaste',
                           'trabajando',
                           'empresa',
                           'cargo',
                           'telefono',
                           'ciudad',
                           'direccion',
                           'sueldo',
                           'fecha_ingreso',
                           'sede',
                           'f_inicio_pos',
                           'horario',
                           'paralelo',
                           'profesion',
                           'anios_profesion',
                           'anios_trabajando',
                           'trabajo1_ant_empresa',
                           'trabajo1_ant_cargo',
                           'trabajo1_ant_direccion',
                           'trabajo1_ant_telefono',
                           'trabajo1_ant_sueldo',
                           'trabajo1_ant_fecha_ingreso',
                           'trabajo1_ant_fecha_salida',
                           'trabajo2_ant_empresa',
                           'trabajo2_ant_cargo',
                           'trabajo2_ant_direccion',
                           'trabajo2_ant_telefono',
                           'trabajo2_ant_sueldo',
                           'trabajo2_ant_fecha_ingreso',
                           'trabajo2_ant_fecha_salida',
                           'sueldo_id'];
}

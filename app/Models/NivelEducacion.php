<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelEducacion extends Model
{
  protected $connection = 'sqlsrv_ACADE';
  protected $table = 'educacion_nivel';
}

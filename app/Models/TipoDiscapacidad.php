<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDiscapacidad extends Model
{
  protected $connection = 'sqlsrv_ACADE';
  protected $table = 'tipo_discapacidad';
}

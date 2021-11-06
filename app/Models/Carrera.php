<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
  protected $connection = 'sqlsrv_ACADE';
  protected $table = 'carreras';
}

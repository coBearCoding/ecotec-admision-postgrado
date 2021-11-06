<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
  protected $connection = 'sqlsrv_ACADE';
  protected $table = 'establecimientos';
}

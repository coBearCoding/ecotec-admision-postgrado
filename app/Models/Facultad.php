<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
  protected $connection = 'sqlsrv_ACADE';
  protected $table = 'facultades';
}

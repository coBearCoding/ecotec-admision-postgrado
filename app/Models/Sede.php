<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
  protected $connection = 'sqlsrv_ACADE';
  protected $table = 'sede';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etnia extends Model
{
  protected $connection = 'sqlsrv_ACADE';
  protected $table = 'etnias';
}

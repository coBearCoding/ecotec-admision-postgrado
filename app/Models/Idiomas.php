<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
  protected $connection = 'sqlsrv_ACADE';
  protected $table = 'idiomas_generales';
}

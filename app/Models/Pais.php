<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $connection = 'sqlsrv_ACADE';
    protected $table = 'pais';
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;

class PostulanteUser extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'postulante_user';
    public $timestamps = false;
    protected $fillable = ['name', 'email'];
}

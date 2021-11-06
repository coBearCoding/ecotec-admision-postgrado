<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudDocumentos extends Model
{
    protected $table = 'solicitud_documentos';
    public $timestamps = false;
    protected $fillable = ['nombre', 'solicitud_id', 'documento_id', 'estado'];
}

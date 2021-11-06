<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulanteIdiomas extends Model
{
  protected $table = 'postulante_idiomas';
  public $timestamps = false;
  protected $fillable = ['idioma1_id',
                         'idioma1_nombre',
                         'idioma1_lectura',
                         'idioma1_escritura',
                         'idioma2_id',
                         'idioma2_nombre',
                         'idioma2_lectura',
                         'idioma2_escritura',
                         'idioma3_id',
                         'idioma3_nombre',
                         'idioma3_lectura',
                         'idioma3_escritura',
                        ];
}

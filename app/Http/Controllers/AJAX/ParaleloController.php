<?php

namespace App\Http\Controllers\AJAX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ParaleloController extends Controller
{

  //AJAX DATA METHODS
  public function paralelo(Request $request)
  {
    $cod_enfa = $request->cod_enfa;

    $cedula = session('cedula');

    $datos = DB::table('postulante as p')
      ->join('postulante_carreras as pc', 'pc.postulante_id', '=', 'p.id')
      ->where('p.documento', strval($cedula))
      ->where('p.nivel_primario', '2')
      ->select(
        'p.*',
        'pc.*',
        'p.telefono as telefono_personal',
        'p.celular as celular_personal',
        'p.direccion as direccion_personal',
        'pc.direccion as direccion_trabajo',
        'pc.telefono as telefono_trabajo'
      )
      ->first();

    $paralelos = DB::connection('sqlsrv_ACADE')
      ->select('exec sp_admisiones_posgrado_enfasis_paralelo ?', array($cod_enfa));


      if ($datos != null) {
        return response()->json([
          'datos' => $datos,
          'paralelos' => $paralelos
        ]);
      }

    return response()->json([
      'datos' => $datos,
      'paralelos' => $paralelos
    ]);
  }
}

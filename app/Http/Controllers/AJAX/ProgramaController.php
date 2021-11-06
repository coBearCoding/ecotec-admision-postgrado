<?php

namespace App\Http\Controllers\AJAX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ProgramaController extends Controller
{
  //AJAX DATA METHODS
  public function programa(Request $request)
  {
    $cod_sede = $request->cod_sede;
    $cod_carr = $request->cod_carr;

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

    $programas = DB::connection('sqlsrv_ACADE')
      ->select('exec sp_admisiones_posgrado_enfasis');

      if ($datos != null) {
        return response()->json([
          'datos' => $datos,
          'programas' => $programas
        ]);
      }
    return response()->json([
      'datos' => null,
      'programas' => $programas
    ]);
  }
}

<?php

namespace App\Http\Controllers\AJAX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class CiudadController extends Controller
{


  public function ciudad(Request $request)
  {

    $cedula = session('cedula');
    $datos = DB::table('postulante as p')
      ->where('p.documento', strval($cedula))
      // ->where('p.nivel_primario', '2')
      ->select(
        'p.*',
        'p.telefono as telefono_personal',
        'p.celular as celular_personal',
        'p.direccion as direccion_personal',
        'p.direccion as sede'
      )
      ->first();


    $provincia = $request->provincia;

    $provincias = DB::connection('sqlsrv_ACADE')
      ->table('provincia')
      ->where('nombre', 'like', '%' . $provincia . '%')
      ->get();

    $cantones = DB::connection('sqlsrv_ACADE')
      ->table('cantones')
      ->where('Cod_Provincia', $provincias[0]->id_provincia)
      ->get();

    if ($datos != null) {
      return response()->json([
        'datos' => $datos,
        'cantones' => $cantones
      ]);
    }
    return response()->json($cantones);
  }
}

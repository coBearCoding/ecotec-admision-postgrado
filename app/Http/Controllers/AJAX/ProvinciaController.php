<?php

namespace App\Http\Controllers\AJAX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProvinciaController extends Controller
{
  public function provincia(Request $request)
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

    $pais = $request->pais;

    $paises = DB::connection('sqlsrv_ACADE')
      ->table('pais')
      ->where('nombre', 'like', '%' . $pais . '%')
      ->get();

    $provincias = DB::connection('sqlsrv_ACADE')
      ->table('provincia')
      ->where('id_pais', $paises[0]->id_pais)
      ->get();

    if ($datos != null) {
      return response()->json([
        'datos' => $datos,
        'provincias' => $provincias
      ]);
    }
    return response()->json($provincias);
  }
}

<?php

namespace App\Http\Controllers\Datos;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etnia;
use App\Models\FinanciamientoTipo;
use App\Models\Pais;
use App\Models\Solicitud;
use App\Models\Postulante;
use App\Models\PostulanteCarreras;
use App\Models\PostulanteUser;
use App\Models\SolicitudDocumentos;
use App\Models\TipoDiscapacidad;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FinanciamientoController extends Controller
{



  public function datosFinanciamiento()
  {
    $datos = Postulante::where('documento', Session::get('cedula'))
      ->where('nivel_primario', 2)
      ->first();

    $financiamiento_tipos = FinanciamientoTipo::where('estado', 'A')->get();


    return view('web.datos-financiamiento', compact('datos', 'financiamiento_tipos'));
  }


  public function saveDatosFinanciamiento(Request $request)
  {
    $postulante = Postulante::where('documento', Session::get('cedula'))
      ->where('nivel_primario', 2)
      ->first();

    $solicitud = Solicitud::where('postulante_id', $postulante->id)
    ->first();

    $postulante->update([
      'financiamiento_tipo' => $request->financiamiento_tipo,
      'financiamiento_banco' => $request->financiamiento_banco
    ]);

    return redirect('/documentos');
  }
}

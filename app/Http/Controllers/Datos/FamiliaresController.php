<?php

namespace App\Http\Controllers\Datos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etnia;
use App\Models\NivelEducacion;
use App\Models\Pais;
use App\Models\Solicitud;
use App\Models\Postulante;
use App\Models\PostulanteCarreras;
use App\Models\PostulanteFamiliares;
use App\Models\PostulanteUser;
use App\Models\SolicitudDocumentos;
use App\Models\TipoDiscapacidad;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FamiliaresController extends Controller
{
  public function datosFamiliares()
  {
    if (empty(Session::get('cedula'))) {
      return redirect('/');
    }

    $cedula = session('cedula');

    $datos = Postulante::rightJoin('postulante_familiares as pf', 'postulante.id', '=', 'pf.postulante_id')
      ->where('postulante.documento', strval($cedula))
      ->where('postulante.nivel_primario', '2')
      ->select(
        'postulante.*',
        'pf.*'
      )
      ->first();

    $niveles_educacion = NivelEducacion::get();

    return view('web.datos-familiares', compact('datos', 'niveles_educacion'));
  }

  public function saveDatosFamiliares(Request $request)
  {

    $cedula = Session::get('cedula');

    $postulante = Postulante::where('documento', $cedula)
    ->where('nivel_primario', 2)
    ->first();

    $guardarDatos = DB::select('SET NOCOUNT ON ; EXEC sp_guardar_datos_familiares ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', [
      $postulante->id,
      $request->nombre_padre,
      $request->apellido_padre,
      $request->email_padre,
      $request->telefono_padre,
      $request->empresa_padre,
      $request->cargo_padre,
      $request->domicilio_padre,
      $request->estudios_padre,
      $request->nombre_madre,
      $request->apellido_madre,
      $request->email_madre,
      $request->telefono_madre,
      $request->empresa_madre,
      $request->cargo_madre,
      $request->domicilio_madre,
      $request->estudios_madre,
      $request->contacto_emergencia,
      $request->celular_emergencia,
      $request->tipo_parentesco1,
      $request->nombre_parentesco1,
      $request->apellido_parentesco1,
      $request->telefono_parentesco1,
      $request->tipo_parentesco2,
      $request->nombre_parentesco2,
      $request->apellido_parentesco2,
      $request->telefono_parentesco2,
      $request->tipo_parentesco3,
      $request->nombre_parentesco3,
      $request->apellido_parentesco3,
      $request->telefono_parentesco3
    ]);

    if($guardarDatos !=null ){
      return redirect('/datos-estudiantiles');
    }else{
      return redirect('/datos-familiares')->withErrors(['msg', 'Error al guardar']);
    }
  }

}

<?php

namespace App\Http\Controllers\Datos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etnia;
use App\Models\Pais;
use App\Models\Solicitud;
use App\Models\Postulante;
use App\Models\PostulanteCarreras;
use App\Models\PostulanteUser;
use App\Models\SolicitudDocumentos;
use App\Models\TipoDiscapacidad;
use App\Sueldo;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ExperienciaLaboralController extends Controller
{

  public function datosExperienciaLaboral()
  {
    $cedula = session('cedula');
    $datos = Postulante::join('postulante_carreras as pc', 'pc.postulante_id', '=', 'postulante.id')
      ->where('postulante.documento', strval($cedula))
      ->where('postulante.nivel_primario', '2')
      ->select(
        'postulante.*',
        'pc.*',
        'postulante.telefono as telefono_personal',
        'postulante.celular as celular_personal',
        'postulante.direccion as direccion_personal',
        'pc.direccion as direccion_trabajo',
        'pc.telefono as telefono_trabajo'
      )
      ->first();

    $sueldos = Sueldo::all();



    if ($datos != null) {
      return view('web.experiencia-laboral', compact('datos', 'sueldos'));
    } else {
      return view('web.experiencia-laboral', compact('datos', 'sueldos'));
    }
  }


  public function saveDatosExperienciaLaboral(Request $request)
  {

    $postulante = Postulante::where('documento', Session::get('cedula'))
      ->where('nivel_primario', 2)
      ->first();

    $postulante_carreras = PostulanteCarreras::where('postulante_id', $postulante->id)
      ->first();

    $postulante_carreras->update([
      'profesion' => $request->profesion,
      'anios_profesion' => $request->anios_profesion,
      'anios_trabajando' => $request->anios_trabajando,
      'empresa' => $request->empresa,
      'cargo' => $request->cargo,
      'telefono' => $request->telefono,
      'direccion' => $request->direccion,
      'sueldo_id' => $request->sueldo,
      'fecha_ingreso' => $request->fecha_ingreso,
      'trabajo1_ant_empresa' => $request->trabajo1_ant_empresa,
      'trabajo1_ant_cargo' => $request->trabajo1_ant_cargo,
      'trabajo1_ant_direccion' => $request->trabajo1_ant_direccion,
      'trabajo1_ant_telefono' => $request->trabajo1_ant_telefono,
      'trabajo1_ant_sueldo' => $request->trabajo1_ant_sueldo,
      'trabajo1_ant_fecha_ingreso' => $request->trabajo1_fecha_ingreso,
      'trabajo1_ant_fecha_salida' => $request->trabajo1_fecha_salida,
      'trabajo2_ant_empresa' => $request->trabajo2_ant_empresa,
      'trabajo2_ant_cargo' => $request->trabajo2_ant_cargo,
      'trabaja2_ant_empresa' => $request->trabajo2_ant_empresa,
      'trabajo2_ant_direccion' => $request->trabajo2_ant_direccion,
      'trabajo2_ant_telefono' => $request->trabajo2_ant_telefono,
      'trabajo2_ant_sueldo' => $request->trabajo2_ant_sueldo,
      'trabajo2_ant_fecha_ingreso' => $request->trabajo2_fecha_ingreso,
      'trabajo2_ant_fecha_salida' => $request->trabajo2_fecha_salida
    ]);




    return redirect('/documentos');
  }
}

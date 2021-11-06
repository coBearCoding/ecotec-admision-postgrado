<?php

namespace App\Http\Controllers\Datos;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Establecimiento;
use App\Models\Etnia;
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

class EstudiantilesController extends Controller
{
  public function datosEstudiantiles()
  {
    if (empty(Session::get('cedula'))) {
      return redirect('/');
    }

    $cedula = session('cedula');

    $datos = Postulante::rightJoin('postulante_estudiantiles as pe', 'postulante.id', '=', 'pe.postulante_id')
      ->where('postulante.documento', strval($cedula))
      ->where('postulante.nivel_primario', '2')
      ->select(
        'postulante.*',
        'pe.*'
      )
      ->first();

    $colegios = Establecimiento::where('id_tipo_establecimiento', 'COL')
      ->where('estado', 'A')
      ->get();

    $tercer_nivel = Establecimiento::whereIn('id_tipo_establecimiento', ['UNI', 'TEC'])
      ->where('estado', 'A')
      ->select('nombre')
      ->groupBy('nombre')
      ->get();

    if ($datos) {
      return view('web.datos-estudiantiles', compact('datos', 'colegios', 'tercer_nivel'));
    } else {
      $datos = NULL;
      return view('web.datos-estudiantiles', compact('datos', 'colegios', 'tercer_nivel'));
    }
  }



  public function saveDatosEstudiantiles(Request $request)
  {

    $cedula = Session::get('cedula');

    $postulante = Postulante::where('documento', $cedula)
      ->where('nivel_primario', 2)
      ->first();


    $colegio_nombre = null;
    $tercer_nivel_nombre = null;
    $posgrado_nombre = null;

    if ($request->institucion_id != 0 && $request->institucion_id != null) {
      $colegio = Establecimiento::where('id_establecimiento', $request->institucion_id)
        ->first();
      $colegio_nombre = $colegio->nombre;
    }

    // if ($request->estudio_institucion_id != 0 && $request->estudio_institucion_id != null) {
    //   $tercer_nivel = Establecimiento::where('id_establecimiento', $request->estudio_institucion_id)
    //     ->first();
    //   $tercer_nivel_nombre = $tercer_nivel->nombre;
    // }
    // $tercer_nivel_nombre = $request->estudio_institucion_nombre;

    // if($request->estudio_institucion_nombre == "Otra"){
    //   $tercer_nivel_nombre = $request->institucion_otra;
    // }


    if ($request->posgrado_institucion_id != 0 && $request->posgrado_institucion_id != null) {
      $posgrado = Establecimiento::where('id_establecimiento', $request->posgrado_institucion_id)
        ->first();
      $posgrado_nombre = $posgrado->nombre;
    }

    $guardarDatos = DB::select('SET NOCOUNT ON ; EXEC sp_guardar_datos_estudiantiles ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', [
      $postulante->id,
      $request->institucion_id,
      $colegio_nombre,
      $request->institucion_inicio,
      $request->graduacion,
      $request->institucion_titulo,
      null,
      null,
      null,
      null,
      $request->estudio_institucion_nombre,
      $request->estudio_titulo,
      $request->estudio_inicio,
      $request->estudio_graduacion,
      $request->posgrado_institucion_id,
      $posgrado_nombre,
      $request->posgrado_titulo,
      $request->posgrado_inicio,
      $request->posgrado_graduacion,
      $request->institucion_otra
    ]);


    return redirect('/datos-experiencia-laboral');
  }
}

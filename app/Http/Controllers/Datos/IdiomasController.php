<?php

namespace App\Http\Controllers\Datos;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etnia;
use App\Models\Idiomas;
use App\Models\Pais;
use App\Models\Solicitud;
use App\Models\Postulante;
use App\Models\PostulanteCarreras;
use App\Models\PostulanteIdiomas;
use App\Models\PostulanteUser;
use App\Models\SolicitudDocumentos;
use App\Models\TipoDiscapacidad;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IdiomasController extends Controller
{

  public function datosIdiomas()
  {
    $cedula = session('cedula');
    $datos = Postulante::join('postulante_idiomas as pi', 'pi.postulante_id', '=', 'postulante.id')
      ->where('postulante.documento', strval($cedula))
      ->where('postulante.nivel_primario', '2')
      ->select('postulante.*', 'pi.*')
      ->first();

    $idiomas = Idiomas::get();

    if ($datos != null) {
      return view('web.datos-idiomas', compact('datos', 'idiomas'));
    } else {
      return view('web.datos-idiomas', compact('datos', 'idiomas'));
    }
  }


  public function saveDatosIdiomas(Request $request)
  {
    $idioma1 = Idiomas::where('id', $request->idioma1_id)->first();
    $idioma2 = Idiomas::where('id', $request->idioma2_id)->first();
    $idioma3 = Idiomas::where('id', $request->idioma3_id)->first();

    $postulante = Postulante::where('documento', Session::get('cedula'))
    ->where('nivel_primario', 2)
    ->first();

    $guardarDatos = DB::select('SET NOCOUNT ON ; EXEC sp_guardar_datos_idiomas ?,?,?,?,?,?,?,?,?,?,?,?,?', [
      $postulante->id,
      $request->idioma1_id,
      $idioma1->nombre,
      $request->idioma1_lectura,
      $request->idioma1_escritura,
      $request->idioma2_id,
      $idioma2->nombre,
      $request->idioma2_lectura,
      $request->idioma2_escritura,
      $request->idioma3_id,
      $idioma3->nombre,
      $request->idioma3_lectura,
      $request->idioma3_escritura
    ]);

    return redirect('/datos-financiamiento');
  }
}

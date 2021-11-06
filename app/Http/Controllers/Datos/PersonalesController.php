<?php

namespace App\Http\Controllers\Datos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etnia;
use App\Models\Pais;
use App\Models\PosgradoContactoTipos;
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
use Symfony\Component\Console\Input\Input;

class PersonalesController extends Controller
{
  public function datosPersonales()
  {
    if (empty(Session::get('cedula'))) {
      return redirect('/');
    }
    $cedula = session('cedula');

    $datos = DB::table('postulante as p')
      ->leftJoin('postulante_carreras as pc', 'pc.postulante_id', '=', 'p.id')
      ->leftJoin('postulante_familiares as pf', 'pf.postulante_id', '=', 'p.id')
      ->where('p.documento', strval($cedula))
      ->where('p.nivel_primario', 2)
      ->select(
        'p.*',
        'pc.*',
        'p.id as postulante_id',
        'p.telefono as telefono_personal',
        'p.celular as celular_personal',
        'p.direccion as direccion_personal',
        'pc.trabajo1_ant_direccion as direccion_trabajo',
        'pc.trabajo1_ant_telefono as telefono_trabajo',
        'pc.enteraste as medio_contacto',
        'pf.celular as celular_emergencia',
        'pf.emergencia as emergencia'
      )
      ->first();

    $postulante_user = PostulanteUser::where('id', Session::get('user_id'))->first();
    $postulante = Postulante::where('documento', $cedula)
    ->where('nivel_primario', 2)
    ->first();

    $solicitud = Solicitud::where('postulante_id', $postulante->id)
    ->first();

    Session::put('solicitud_id', $solicitud->id);

    $solicitud_documentos = SolicitudDocumentos::where('solicitud_id', $solicitud->id)
    ->where('documento_id', 23)
    ->first();

    $paises = Pais::where('estado', 'A')->get();

    $contactos_tipos = PosgradoContactoTipos::get();

    $etnias =  Etnia::where('estado', 'A')->get();

    $tipos_discapacidad =  TipoDiscapacidad::where('estado', 'A')->get();

    if ($datos != null) {
      return view('web.datos-personales', compact('datos', 'paises', 'contactos_tipos', 'etnias', 'tipos_discapacidad', 'postulante_user', 'solicitud_documentos'));
    } else {
      return view('web.datos-personales', compact('datos', 'contactos_tipos', 'paises', 'etnias', 'tipos_discapacidad', 'postulante_user', 'solicitud_documentos'));
    }
  }

  //SAVE DATA
  public function saveDatosPersonales(Request $request)
  {
    //GUARDAR DOCUMENTO EN EL SERVIDOR
    $cedula = session('cedula');
    $fecha_nacimiento_no_format = Carbon::parse($request->fecha_nacimiento);
    $fecha_nacimiento = $fecha_nacimiento_no_format->format('Y-m-d');



    //VALIDAR SI EL INPUT ESTA LLENO SI NO, PREGUNTAR SI TIENE
    // NOMBRE DEL DOCUMENTO EN LA BASE.
    if ($request->hasFile('foto_carnet')) {
      $fotoCarnet = $request->file('foto_carnet');
      $url_origen = $fotoCarnet->path();
      $extension = $fotoCarnet->getClientOriginalExtension();

      $abrevia_doc = 'PFOT';

      $archivo_copia_destino = env("ROUTE_SAVE_FILE");
      $nombre_doc = $abrevia_doc . '_' . $cedula . '.' . $extension;

      $guardarFotoCarnet = move_uploaded_file($url_origen, $archivo_copia_destino . '/' . $nombre_doc);
    }

      $postulante = Postulante::where('documento', $cedula)
        ->where('nivel_primario', 2)
        ->first();

      $postulante->update([
        'nombres' => $request->nombres,
        'apellidos' => $request->apellidos,
        'fecha_nacimiento' => $fecha_nacimiento,
        'estado_civil' => $request->estado_civil,
        'discapacidad' => $request->discapacidad,
        'tipo_discapacidad' => $request->tipo_discapacidad,
        'porcentaje_discapacidad' => $request->porcentaje_discapacidad,
        'direccion' => $request->direccion_domicilio,
        'provincia' => $request->provincia,
        'canton' => $request->canton,
        'telefono' => $request->telefono_domicilio,
        'celular' => $request->celular,
        'etnia' => $request->etnia,
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'linkedin' => $request->linkedin,
        'twitter' => $request->twitter,
        'tiktok' => $request->tiktok,
        'pais_nacionalidad' => $request->pais_nacionalidad,
        'pais_residencia' => $request->pais_residencia,
        'nacionalidad'=>$request->nacionalidad,
        'sexo'=>$request->sexo,
        'conadis'=>$request->conadis
      ]);

      $postulante_id = $postulante->id;

      $postulante_carreras = PostulanteCarreras::where('postulante_id', $postulante_id)
      ->first();

      $postulante_carreras->update([
        'trabajo1_ant_direccion' => $request->direccion_trabajo,
        'trabajo1_ant_telefono' => $request->telefono_trabajo,
        'enteraste'=>$request->medios_contactos
      ]);

      //CREAR O ACTUALIZAR CONTACTO EN TABLA POSTULANTE_FAMILIARES
      $postulante_familiares = PostulanteFamiliares::updateOrCreate(
        [
          'postulante_id'=>$postulante_id,
        ],
        [
          'postulante_id'=>$postulante_id,
          'emergencia'=>$request->contacto_emergencia,
          'celular'=>$request->celular_emergencia
        ]
      );

      //GUARDAR DOCUMENTO EN LA BASE
      $solicitud = Solicitud::where('id', Session::get('solicitud_id'))
          ->first();

        $solicitud_documentos = SolicitudDocumentos::where('solicitud_id', $solicitud->id)
          ->first();

      if ($request->hasFile('foto_carnet')) {
        if ($solicitud_documentos != null) {
          $solicitud_documentos->update([
            'nombre' => $nombre_doc,
            'documento_id' => 23,
          ]);
          return redirect('/datos-estudiantiles');
        } else {
          $solicitud_documentos = SolicitudDocumentos::create([
            'nombre' => $nombre_doc,
            'solicitud_id' => $solicitud->id,
            'documento_id' => 23,
            'estado' => null,
          ]);
          return redirect('/datos-estudiantiles');
        }
      }
      else{
        if ($solicitud_documentos != null) {
          return redirect('/datos-estudiantiles');
        }else{
          return redirect('/datos-personales')->withErrors(['msg'=>'No existe foto carnet cargada']);
        }
      }
  }
}

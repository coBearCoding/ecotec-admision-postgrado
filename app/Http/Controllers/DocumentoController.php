<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use App\Models\Postulante;
use App\Models\Solicitud;
use App\Models\SolicitudDocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\DocumentosEnviados;
use App\Models\SolicitudEvaluacion;

class DocumentoController extends Controller
{
  public function index()
  {
    if (empty(Session::get('cedula'))) {
      return redirect('/');
    }

    $cedula = session('cedula');

    $postulante = Postulante::where('documento', $cedula)
      ->where('nivel_primario', 2)
      ->first();
    $solicitud = Solicitud::where('postulante_id', $postulante->id)
      ->first();

    $documentos = SolicitudDocumentos::where('solicitud_id', $solicitud->id)->get();
    $documentos = $documentos->where('estado', '!=', 'R'); //Se filtran los archivos rechazados para dar paso al nuevo archivo subido

    $documentos = $documentos->map(function ($documento, $key) {
      return substr($documento->nombre, 0, 4);
    });

    //Comprobacion de cargado de archivos individual
    $cedula = $documentos->filter(function ($doc) {
      return $doc == 'PCED';
    })->first();

    $hoja_de_vida = $documentos->filter(function ($doc) {
      return $doc == 'POCV';
    })->first();

    $titulo_senescyt = $documentos->filter(function ($doc) {
      return $doc == 'PTIS';
    })->first();

    $titulo_tercer_nivel = $documentos->filter(function ($doc) {
      return $doc == 'PTI3';
    })->first();

    $certificado_ingles = $documentos->filter(function ($doc) {
      return $doc == 'PIB2';
    })->first();

    $recomendacion_acad_lab = $documentos->filter(function ($doc) {
      return $doc == 'PREC';
    });

    $carta_motivacion = $documentos->filter(function($doc){
      return $doc == 'CAMT';
    })->first();

    //Fin

    $ok = false;

    if ($cedula && $hoja_de_vida && $titulo_senescyt && $titulo_senescyt
    && $titulo_tercer_nivel && $certificado_ingles && ($recomendacion_acad_lab->count() == 2)
    && $carta_motivacion) {
      $ok = true; // Se valida si todos los documentos fueron cargados
    }

    return
      view(
        'documentos.documentos',
        compact('documentos',
        'cedula',
        'hoja_de_vida',
        'titulo_senescyt',
        'titulo_tercer_nivel',
        'certificado_ingles',
        'recomendacion_acad_lab',
        'carta_motivacion',
        'ok')
      );
  }

  public function saveDocumentos(Request $request)
  {
    if (empty(Session::get('cedula'))) {
      return redirect('/');
    }

    $cedula = session('cedula');

    $postulante = Postulante::where('documento', $cedula)
      ->where('nivel_primario', 2)
      ->first();

    $solicitud = Solicitud::where('postulante_id', $postulante->id)
      ->first();

    $array = [ //arreglo para comprobar cada uno de los archivos en caso de que actualicen el estado de alguno
      'PCED' => ['name' => 'cedula', 'id' => '22'],
      'POCV' => ['name' => 'hoja_de_vida', 'id' => '17'],
      'PTIS' => ['name' => 'titulo_senescyt', 'id' => '24'],
      'PTI3' => ['name' => 'titulo_tercer_nivel', 'id' => '18'],
      'PIB2' => ['name' => 'certificado_ingles', 'id' => '19'],
      'PREC' => ['name' => 'recomendacion_acad_lab', 'id' => '20'],
      'PREC2' => ['name' => 'recomendacion_acad_lab2', 'id' => '27'],
      'CAMT' => ['name' => 'carta_motivacion', 'id' => '21'],
    ];

    foreach ($array as $key => $arreglo) {
      $nameField = $arreglo['name'];


      if ($request->hasFile($nameField)) {

        $fotoCarnet = $request->file($nameField);
        $abrevia_doc = $key;
        $url_origen = $fotoCarnet->path();
        $extension = $fotoCarnet->getClientOriginalExtension();
        $archivo_copia_destino = env("ROUTE_SAVE_FILE");
        $nombre_doc = $abrevia_doc . '_' . $cedula . '.' . $extension;

        move_uploaded_file($url_origen, $archivo_copia_destino . '/' . $nombre_doc);

        // Si el registro existe lo actualiza, sino, crea un nuevo registro.
        $solicitud_documentos = SolicitudDocumentos::updateOrCreate(
          [
            'solicitud_id' => $solicitud->id,
            'documento_id' => $arreglo['id'],
          ],
          [
            'estado' => null,
            'nombre' => $nombre_doc,
          ]
        );
        //Fin
      }

      //GUARDAR PUNTUACION DE DOCUMENTOS ENVIADOS
      $evaluaciones = Evaluacion::all();
      foreach($evaluaciones as $evaluacion){
        if($evaluacion->id != 12 && $evaluacion->id != 13)
          $solicitud_evaluacion = SolicitudEvaluacion::updateOrCreate(
            [
              'solicitud_id'=>$solicitud->id,
              'evaluacion_id'=>$evaluacion->id
            ],
            [
              'puntaje'=>$evaluacion->puntaje,
              'estado'=>'A'
            ]
           );
      }
    }

    Mail::to($postulante->email)
    ->send(new DocumentosEnviados());

    //ACTUALIZAR ESTADO DE LA SOLICITUD
    $solicitud->update([
      'estado_id'=>10
    ]);


    return redirect()->route('documentos');
  }
}

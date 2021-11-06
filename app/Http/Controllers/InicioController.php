<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use App\Models\Sede;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Credenciales;
use App\Models\Carrera;
use App\Models\Facultad;
use App\Models\PostulanteUser;
use App\Models\Programa;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class InicioController extends Controller
{
  // Get data LANDING PAGES
  public function index()
  {
    if (empty(Session::get('cedula'))) {
      return redirect('/');
    }

    $cedula = session('cedula');

    $datos = Postulante::where('postulante.documento', strval($cedula))
      ->where('postulante.nivel_primario', '2')
      ->select(
        'postulante.*',
        'postulante.telefono as telefono_personal',
        'postulante.celular as celular_personal',
        'postulante.direccion as direccion_personal',
        'postulante.direccion as sede',
        'postulante.id as postulante_id'
      )
      ->first();

    $sedes = Sede::where('estado', 'A')->get();

    if ($datos != null) {
      return redirect('/login');
    } else {
      return view('web.datos-principales', compact('sedes', 'datos', 'cedula'));
    }
  }

  public function searchPostulante(Request $request)
  {
    $user = Auth::user();
    if ($user) {
      $postulante = Postulante::where('user_id', $user->id)
      ->first();

      Session::put('cedula', $postulante->documento);
      return redirect('/datos-personales');
    } else {
      Session::put('cedula', $request->cedula);
      return redirect('/datos-principales');
    }
  }

  // Save data
  public function saveDatosPrincipales(Request $request)
  {
    request()->validate([
      'programa' =>['required'],
      'fecha_inicio' =>['required'],
      'horario' =>['required'],
    ]);
    $postulante_user = PostulanteUser::where('email', $request->email)
    ->where('nivel_primario', 2)
    ->first();

    if ($postulante_user != null) {
      $datos = null;
      return Redirect::back()->withErrors(['msg'=>'Cedula ya utilizada.']);
    }

    $carrera = Carrera::where('estado', 'A')
      ->where('cod_carr', $request->carrera)
      ->where('cod_facu', 60)
      ->first();

    $programa = Programa::where('estado', 'A')
      ->where('cod_carr', $request->carrera)
      ->where('cod_enfa', $request->programa)
      ->where('cod_facu', 60)
      ->first();

    $facultad =  Facultad::where('estado', 'A')
      ->where('cod_facu', 60)
      ->first();

    $timeStamp = Carbon::now();


    $postulante_user_id = PostulanteUser::insertGetId([
      'name' => $request->nombres . ' ' . $request->apellidos,
      'email' => $request->email,
      'email_verified_at' => null,
      'password' => $request->documento,
      'status' => 'A',
      'created_at' => $timeStamp,
      'updated_at' => $timeStamp,
      'rol_id' => 2,
      'nivel_primario'=>2
    ]);

    $guardarDatos = DB::select('SET NOCOUNT ON ; EXEC sp_guardar_datos_principales ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', [
      null,
      $request->nombres,
      $request->apellidos,
      $request->tipo_documento,
      $request->documento,
      $request->email,
      $request->telefono,
      $request->celular,
      $request->direccion,
      null,
      $facultad->cod_facu,
      $facultad->des_facu,
      null,
      null,
      null,
      null,
      $request->paralelo,
      $request->fecha_inicio,
      $request->horario,
      null,
      null,
      null,
      2,
      $postulante_user_id,
      $request->programa
    ]);

    $date = $timeStamp->format('Y');

    $postulante_id = $guardarDatos[0]->POSTULANTE_ID;
    $cod = str_pad($postulante_id, 6, "0", STR_PAD_LEFT);
    $cod_solicitud = $date . $cod;

    $solicitud_id = Solicitud::insertGetId([
      'postulante_id' => $postulante_id,
      'cod_solicitud' => $cod_solicitud,
      'estado_id' => 9,
      'motivo_aplicar' => null,
      'created_at' => $timeStamp,
      'forma_aplicar' => null,
      'servicio_id' => 1,
      'migrado' => null,
    ]);

    // [sp_guardar_datos_gestor]
    // @solicitud_id int=null,
    // @documento varchar(250)=null,
    // @nivel_primario int =null

    $postulante = Postulante::where('id', $postulante_id)
    ->first();

    $asignar_gestor = DB::select('SET NOCOUNT ON;EXEC sp_guardar_datos_gestor ?,?,?', [
      $solicitud_id,
      $postulante->documento,
      2
    ]);

    if($asignar_gestor){
      $email = $request->email;
      $name = $request->nombres . ' ' . $request->apellidos;
      $password = $request->documento;

      Mail::to($email)
        ->send(new Credenciales($name, $email, $password));
    }

    if ($solicitud_id != null) {
      return redirect('/datos-personales');
    }
  }
}

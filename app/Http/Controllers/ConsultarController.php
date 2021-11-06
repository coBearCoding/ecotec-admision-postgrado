<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use App\Models\Solicitud;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConsultarController extends Controller
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

        if (!$postulante) {
            return redirect('/');
        }

        $solicitud = Solicitud::where('postulante_id', $postulante->id)
            ->first();

        if (!$solicitud) {
            return redirect('/');
        }

        $estado = Status::where('id', $solicitud->estado_id)->first();

        return view('consultar.consultar', compact('solicitud', 'estado', 'postulante'));
    }
}

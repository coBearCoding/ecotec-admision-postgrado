<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use App\Models\PostulanteUser;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

        $postulante_user = PostulanteUser::where('email', $postulante->email)
            ->first();

        if (!$postulante_user) {
            return redirect('/');
        }

        return view('users.perfil', compact('postulante_user'));
    }

    public function saveInformacionPerfil(Request $request)
    {
        $cedula = session('cedula');

        $postulante = Postulante::where('documento', $cedula)
            ->where('nivel_primario', 2)
            ->first();

        $postulante_user = PostulanteUser::where('email', $postulante->email)
            ->first();

        $postulante_user = $postulante_user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $postulante = $postulante->update([
            'email' => $request->email
        ]);

        return redirect()->route('perfil');
    }

    public function updatePassword(Request $request)
    {
        $cedula = session('cedula');

        $postulante = Postulante::where('documento', $cedula)
            ->where('nivel_primario', 2)
            ->first();

        $postulante_user = PostulanteUser::where('email', $postulante->email)
            ->first();

        if ($request->old_password != $postulante_user->password) {
            return redirect()->route('perfil')->with('msg', 'La contraseña actual es incorrecta.');
        }

        if ($request->new_password1 != $request->new_password2) {
            return redirect()->route('perfil')->with('msg', 'La nueva contraseña no coincide.');
        }

        $postulante_user = $postulante_user->update([
            'password' => $request->password
        ]);

        return redirect()->route('perfil');
    }
}

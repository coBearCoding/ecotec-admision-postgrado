<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use App\Models\PostulanteUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{

  public function index(){
    return view('auth.login');
  }

    public function login(Request $request){
      $postulante_user = PostulanteUser::where('email', $request->email)
      ->where('password', $request->password)
      ->first();

      if($postulante_user){
        $postulante = Postulante::where('user_id', $postulante_user->id)
        ->first();

          Auth::login($postulante_user);

          $request->session()->put('cedula', $postulante->documento);

          return redirect('/datos-personales');
      }
      return redirect('/login')->withErrors(['msg'=> 'Usuario o contrasena incorrecta']);
    }

    public function logout(Request $request){
      Auth::logout();

      $request->session->invalidate();
      $request->session()->regenerateToken();

      return redirect('/login');
    }
}

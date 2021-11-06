<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
  return view('web.home');
});

Route::get('/datos-principales', 'InicioController@index')->name('inicio');
Route::get('/datos-personales', 'Datos\PersonalesController@datosPersonales')->name('datosPersonales')->middleware('auth');
Route::get('/datos-familiares', 'Datos\FamiliaresController@datosFamiliares')->name('datosFamiliares')->middleware('auth');
Route::get('/datos-estudiantiles', 'Datos\EstudiantilesController@datosEstudiantiles')->name('datosEstudiantiles')->middleware('auth');
Route::get('/datos-financiamiento', 'Datos\FinanciamientoController@datosFinanciamiento')->name('datosFinanciamiento')->middleware('auth');
Route::get('/datos-experiencia-laboral', 'Datos\ExperienciaLaboralController@datosExperienciaLaboral')->name('datosExperienciaLaboral')->middleware('auth');
Route::get('/datos-idiomas', 'Datos\IdiomasController@datosIdiomas')->name('datosIdiomas')->middleware('auth');
Route::get('/documentos', 'DocumentoController@index')->name('documentos')->middleware('auth');
Route::get('/consultar', 'ConsultarController@index')->name('consultar')->middleware('auth');
Route::get('/perfil', 'HomeController@index')->name('perfil')->middleware('auth');



// CUSTOM LOGIN METHODS
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/login-user', 'AuthController@login')->name('login-user');


// Route::get('/experiencia-laboral', function () {
//     return view('web.experiencia-laboral');
// });


// Route::get('/perfil', function () {
//     return view('users.perfil');
// });

// Route::get('/documentos', function () {
//     return view('documentos.documentos');
// });

// Route::get('/consultar', function () {
//     return view('consultar.consultar');
// });


Route::post('/searchPostulante', 'InicioController@searchPostulante')->name('searchPostulante');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');



// MANAGE LOGIN
// Route::post('/login-user','AuthController@login')->name('login-user');

// SAVE DATA
Route::post('/save-datos-principales', 'InicioController@saveDatosPrincipales')->name('saveDatosPrincipales');
Route::post('/save-datos-personales', 'Datos\PersonalesController@saveDatosPersonales')->name('saveDatosPersonales');
Route::post('/save-datos-familiares', 'Datos\FamiliaresController@saveDatosFamiliares')->name('saveDatosFamiliares');
Route::post('/save-datos-estudiantiles', 'Datos\EstudiantilesController@saveDatosEstudiantiles')->name('saveDatosEstudiantiles');
Route::post('/save-datos-financiamiento', 'Datos\FinanciamientoController@saveDatosFinanciamiento')->name('saveDatosFinanciamiento');
Route::post('/save-datos-idiomas', 'Datos\IdiomasController@saveDatosIdiomas')->name('saveDatosIdiomas');
Route::post('/save-datos-experiencia-laboral', 'Datos\ExperienciaLaboralController@saveDatosExperienciaLaboral')->name('saveDatosExperienciaLaboral');
Route::post('/save-documentos', 'DocumentoController@saveDocumentos')->name('saveDocumentos');
Route::post('/save-informacion-perfil', 'HomeController@saveInformacionPerfil')->name('saveInformacionPerfil');
Route::post('/update-password', 'HomeController@updatePassword')->name('updatePassword');







// AJAX DATA METHODS
Route::post('/carrera', 'AJAX\CarreraController@carreras')->name('carreras');
Route::post('/programa', 'AJAX\ProgramaController@programa')->name('programa');
Route::post('/paralelo', 'AJAX\ParaleloController@paralelo')->name('paralelo');
Route::post('/provincia', 'AJAX\ProvinciaController@provincia')->name('provincia');
Route::post('/ciudad', 'AJAX\CiudadController@ciudad')->name('ciudad');

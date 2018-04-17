<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* ================== Prospectos================== */
Route::resource('/prospectos', 'ProspectosController');
Route::resource('/prospectos_crear', 'ProspectosController@create');
Route::get('/prospectos_dt_ajax', 'ProspectosController@dtajax');



Route::get('files/{hash}/{name}', 'UploadsController@get_file');
Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
    	Route::post('/citaapp', 'API\APICitaController@store');
    	Route::get('/cliente-ajaxapp', 'API\APICitaController@buscarCliente');
	});
Route::auth();
/* ================== Access Uploaded Files ================== */

$as = "";
/* ================== Socio Routes ================== */
Route::group(['as' => $as, 'middleware' => ['auth', 'permission:FRANQUICIATARIO_PANEL']], function () {

	/* ================== Ajax calls JSON ================== */
	Route::get('/calendariofran-ajax', 'CitasController@jsonCalendar');
	Route::get('/clientefran-ajax', 'CitasController@buscarCliente');

	Route::get('/pedicuristafran-ajax', 'CitasController@buscarPedicurista');

	
	Route::get('/horariofran-ajax', 'CitasController@buscarHorario');

	Route::get('/comidainiciafran-ajax', 'CitasController@comidainiciaCalendar');

	Route::get('/comidaterminafran-ajax', 'CitasController@comidaterminCalendar');

		Route::get('/citaconfirmfran-ajax', 'CitasController@clienteConfirm');


    Route::get('noticias', 'NoticiaController@index');
	Route::get('noticia/{id}', 'NoticiaController@detail');
	Route::get('evento/{id}', 'EventoController@detail');
	Route::get('empresa/{id}', 'EmpresaController@detail');
	/* ================== User Profile Routes ================== */
	Route::get('user_profile', 'UserProfileController@index');
    Route::get('user_pdashboard', 'UserProfileController@dashboard');
    Route::get('profile_company', 'UserProfileController@company');
/* ================== ComiteRoutes ================== */
    
	Route::get('front_comite/{id}', 'ComiteController@detail');
	Route::get('/asistencias/email/{id}', 'ComiteController@create_from_email');
    Route::post('/asistencias/create/', 'ComiteController@store');
	Route::get('/asistencias/emailcancelar/{id}', 'ComiteController@cancel_from_email');
	Route::post('/asistencias/update/{id}', 'ComiteController@update');
	Route::get('/encuestas/fromemail/{id}', 'ComiteController@encuesta_from_email');
	Route::post('/encuestas/storeencuesta/{id}', 'ComiteController@store_encuesta');
	


	/* ================== Citas ================== */
	Route::resource('/citas', 'CitasController');
	Route::resource('/citasver', 'CitasController@index');
	Route::get('/cita_dt_ajax', 'CitasController@dtajax');

	Route::get('/crear_cita', 'CitasController@createcita');

	/* ================== FacturaXMLs ================== */
	Route::resource('/facturaxmls', 'EstadoCuentasController');
	Route::get('/facturaxml_dt_ajax', 'EstadoCuentasController@dtajax');
    Route::get('/estado_cuenta', 'EstadoCuentasController@index');


	/* ================== Reportess ================== */
	Route::resource('/reportes', 'ReportesController');
	Route::get('/reporte_dt_ajax', 'ReportesController@dtajax');
   
   /* ================== Encuestass ================== */
	Route::resource('/encuestas', 'EncuestasController');
	Route::get('/encuesta_dt_ajax', 'EncuestasController@dtajax');

/* ================== Peticiones ================== */
	Route::resource('/peticiones', 'PeticionsController');
	Route::get('/peticiones_dt_ajax', 'PeticionsController@dtajax');
   
});

/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';

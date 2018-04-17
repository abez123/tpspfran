<?php

/* ================== Homepage ================== */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	/* ================== Ajax calls JSON ================== */
	Route::get('/sucursal-ajax', 'LA\CitasController@buscarSucursal');

	Route::get('/calendario-ajax', 'LA\CitasController@jsonCalendar');

	Route::get('/cliente-ajax', 'LA\CitasController@buscarCliente');

	Route::get('/pedicurista-ajax', 'LA\CitasController@buscarPedicurista');

	
	Route::get('/horario-ajax', 'LA\CitasController@buscarHorario');

	Route::get('/comidainicia-ajax', 'LA\CitasController@comidainiciaCalendar');

	Route::get('/comidatermina-ajax', 'LA\CitasController@comidaterminCalendar');

	Route::get('/citaconfirm-ajax', 'LA\CitasController@clienteConfirm');


	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	
	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');
	
	/* ================== Organizations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/organizations', 'LA\OrganizationsController');
	Route::get(config('laraadmin.adminRoute') . '/organization_dt_ajax', 'LA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');





	/* ================== Sucursals ================== */
	Route::resource(config('laraadmin.adminRoute') . '/sucursals', 'LA\SucursalsController');
	Route::get(config('laraadmin.adminRoute') . '/sucursal_dt_ajax', 'LA\SucursalsController@dtajax');

	/* ================== Pedicuristas ================== */
	Route::resource(config('laraadmin.adminRoute') . '/pedicuristas', 'LA\PedicuristasController');
	Route::get(config('laraadmin.adminRoute') . '/pedicurista_dt_ajax', 'LA\PedicuristasController@dtajax');

	/* ================== Horarios ================== */
	Route::resource(config('laraadmin.adminRoute') . '/horarios', 'LA\HorariosController');
	Route::get(config('laraadmin.adminRoute') . '/horario_dt_ajax', 'LA\HorariosController@dtajax');

	/* ================== Servicios ================== */
	Route::resource(config('laraadmin.adminRoute') . '/servicios', 'LA\ServiciosController');
	Route::get(config('laraadmin.adminRoute') . '/servicio_dt_ajax', 'LA\ServiciosController@dtajax');

	/* ================== Pedicurista_Servicios ================== */
	Route::resource(config('laraadmin.adminRoute') . '/pedicurista_servicio', 'LA\Pedicurista_ServicioController');
	Route::get(config('laraadmin.adminRoute') . '/pedicurista_servicio_dt_ajax', 'LA\Pedicurista_ServicioController@dtajax');

	/* ================== Citas ================== */
	Route::resource(config('laraadmin.adminRoute') . '/citas', 'LA\CitasController');
	Route::get(config('laraadmin.adminRoute') . '/cita_dt_ajax', 'LA\CitasController@dtajax');

	Route::get(config('laraadmin.adminRoute') . '/createcita', 'LA\CitasController@createcita');

	


	/* ================== Clientes ================== */
	Route::resource(config('laraadmin.adminRoute') . '/clientes', 'LA\ClientesController');
	Route::get(config('laraadmin.adminRoute') . '/cliente_dt_ajax', 'LA\ClientesController@dtajax');
		Route::post(config('laraadmin.adminRoute') . '/change_passwordcliente/{id}', 'LA\ClientesController@change_password');

	/* ================== Incapacidads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/incapacidads', 'LA\IncapacidadsController');
	Route::get(config('laraadmin.adminRoute') . '/incapacidad_dt_ajax', 'LA\IncapacidadsController@dtajax');


	/* ================== Productos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/productos', 'LA\ProductosController');
	Route::get(config('laraadmin.adminRoute') . '/producto_dt_ajax', 'LA\ProductosController@dtajax');

	/* ================== Pedidos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/pedidos', 'LA\PedidosController');
	Route::get(config('laraadmin.adminRoute') . '/pedido_dt_ajax', 'LA\PedidosController@dtajax');

	/* ================== Franquiciatarios ================== */
	Route::resource(config('laraadmin.adminRoute') . '/franquiciatarios', 'LA\FranquiciatariosController');
	Route::get(config('laraadmin.adminRoute') . '/franquiciatario_dt_ajax', 'LA\FranquiciatariosController@dtajax');

	Route::post(config('laraadmin.adminRoute') . '/change_passwordfran/{id}', 'LA\FranquiciatariosController@change_password');

	/* ================== Cuentas ================== */
	Route::resource(config('laraadmin.adminRoute') . '/cuentas', 'LA\CuentasController');
	Route::get(config('laraadmin.adminRoute') . '/cuenta_dt_ajax', 'LA\CuentasController@dtajax');

	/* ================== Documentos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/documentos', 'LA\DocumentosController');
	Route::get(config('laraadmin.adminRoute') . '/documento_dt_ajax', 'LA\DocumentosController@dtajax');

	/* ================== FacturaXMLs ================== */
	Route::resource(config('laraadmin.adminRoute') . '/facturaxmls', 'LA\FacturaXMLsController');
	Route::get(config('laraadmin.adminRoute') . '/facturaxml_dt_ajax', 'LA\FacturaXMLsController@dtajax');

	/* ================== Reportes ================== */
	Route::resource(config('laraadmin.adminRoute') . '/reportes', 'LA\ReportesController');
	Route::get(config('laraadmin.adminRoute') . '/reporte_dt_ajax', 'LA\ReportesController@dtajax');

	/* ================== EncuestaISFs ================== */
	Route::resource(config('laraadmin.adminRoute') . '/encuestaisfs', 'LA\EncuestaISFsController');
	Route::get(config('laraadmin.adminRoute') . '/encuestaisf_dt_ajax', 'LA\EncuestaISFsController@dtajax');

	/* ================== Empresas ================== */
	Route::resource(config('laraadmin.adminRoute') . '/empresas', 'LA\EmpresasController');
	Route::get(config('laraadmin.adminRoute') . '/empresa_dt_ajax', 'LA\EmpresasController@dtajax');

	/* ================== Enlaces ================== */
	Route::resource(config('laraadmin.adminRoute') . '/enlaces', 'LA\EnlacesController');
	Route::get(config('laraadmin.adminRoute') . '/enlace_dt_ajax', 'LA\EnlacesController@dtajax');

	/* ================== Noticias ================== */
	Route::resource(config('laraadmin.adminRoute') . '/noticias', 'LA\NoticiasController');
	Route::get(config('laraadmin.adminRoute') . '/noticia_dt_ajax', 'LA\NoticiasController@dtajax');

	/* ================== Prospectos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/prospectos', 'LA\ProspectosController');
	Route::get(config('laraadmin.adminRoute') . '/prospecto_dt_ajax', 'LA\ProspectosController@dtajax');

           /* ================== Expos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/expos', 'LA\ExposController');
	Route::get(config('laraadmin.adminRoute') . '/expo_dt_ajax', 'LA\ExposController@dtajax');

	/* ================== Peticions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/peticions', 'LA\PeticionsController');
	Route::get(config('laraadmin.adminRoute') . '/peticion_dt_ajax', 'LA\PeticionsController@dtajax');

	/* ================== Checklists ================== */
	Route::resource(config('laraadmin.adminRoute') . '/checklists', 'LA\ChecklistsController');
	Route::get(config('laraadmin.adminRoute') . '/checklist_dt_ajax', 'LA\ChecklistsController@dtajax');

	Route::get(config('laraadmin.adminRoute') . '/checklists/{id}/pdf', 'LA\ChecklistsController@pdf');

	/* ================== Compromisos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/compromisos', 'LA\CompromisosController');
	Route::get(config('laraadmin.adminRoute') . '/compromiso_dt_ajax', 'LA\CompromisosController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/compromiso_dt_ajax_detalle/{id}', 'LA\CompromisosController@dtajax_detalle');

	/* ================== 5sMethods ================== */
	Route::resource(config('laraadmin.adminRoute') . '/cincosmethods', 'LA\CincosMethodsController');
	Route::get(config('laraadmin.adminRoute') . '/cincosmethod_dt_ajax', 'LA\CincosMethodsController@dtajax');

});

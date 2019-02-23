<?php

/* ================== Homepage ================== */
//Route::get('/', 'HomeController@index');
//Route::get('/home', 'HomeController@index');
Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index')->name('Dashboard');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	
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
	
	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');



	/* ================== Roads_Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roads_departments', 'LA\Roads_DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/roads_department_dt_ajax', 'LA\Roads_DepartmentsController@dtajax');

	/* ================== StateBuildingCompanies ================== */
	Route::resource(config('laraadmin.adminRoute') . '/statebuildingcompanies', 'LA\StateBuildingCompaniesController');
	Route::get(config('laraadmin.adminRoute') . '/statebuildingcompany_dt_ajax', 'LA\StateBuildingCompaniesController@dtajax');

	/* ================== SolidWaste_companies ================== */
	Route::resource(config('laraadmin.adminRoute') . '/solidwaste_companies', 'LA\SolidWaste_companiesController');
	Route::get(config('laraadmin.adminRoute') . '/solidwaste_company_dt_ajax', 'LA\SolidWaste_companiesController@dtajax');

	/* ================== Water_supply_companies ================== */
	Route::resource(config('laraadmin.adminRoute') . '/water_supply_companies', 'LA\Water_supply_companiesController');
	Route::get(config('laraadmin.adminRoute') . '/water_supply_company_dt_ajax', 'LA\Water_supply_companiesController@dtajax');

	/* ================== Mrdis ================== */
	Route::resource(config('laraadmin.adminRoute') . '/mrdis', 'LA\MrdisController');
	Route::get(config('laraadmin.adminRoute') . '/mrdi_dt_ajax', 'LA\MrdisController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/where_mrdi_dt_ajax', 'LA\MrdisController@wheredtajax');

	/* ================== Twotestmodules ================== */
	Route::resource(config('laraadmin.adminRoute') . '/twotestmodules', 'LA\TwotestmodulesController');
	Route::get(config('laraadmin.adminRoute') . '/twotestmodule_dt_ajax', 'LA\TwotestmodulesController@dtajax');
});

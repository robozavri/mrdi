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
//
Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/merdiExcelExport', 'ExcelParserConrtoller@excelExportMrdi')->name('merdiExcelExport');
//Route::match(['get','post'],'/','ExcelParserConrtoller@parseExcel')->name('main');

Route::get('/getGov_pice','HomeController@getGov_pice')->name('getGov_pice');
Route::post('/getGov_piceByRegion','HomeController@getGov_piceByRegion')->name('getGov_piceByRegion');
Route::get('/getBudgetSums','HomeController@getBudgetSums')->name('getBudgetSums');


/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';

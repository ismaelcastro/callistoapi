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
Route::group(array('prefix' => 'api'), function(){
	Route::get('/', function(){
		return response()->json(['message' => 'Callisto API', 'status' => 'Connected']);
	});
	Route::get('faturamento', 'StorageProcedureController@faturamentoTotal');
	Route::resource('filiais', 'FilialController');
	Route::resource('visitasComerciais', 'VisitaController');
	
});

Route::get('/', function () {
    return redirect('api');
});

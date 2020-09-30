<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::get('verify','Auth\EmailVerifyController@index')->name('verify');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout')->name('logout');


Route::group(['prefix'=>'gestion','namespace'=>'Administracion','middleware'=>'auth'], function(){ 
    route::get('ver/cliente','AdminclienteController@index')->name('admincliente.index'); 
    route::get('crear/cliente','AdminclienteController@create')->name('admincliente.create');  
    route::post('store/cliente','AdminclienteController@store')->name('admincliente.store');       
    route::get('gestionar/cliente/{admincliente}','AdminclienteController@adminCliente_modulos')->name('admincliente.adminCliente_modulos');
    route::post('modulo/cliente/{admincliente}','AdminclienteController@admincliente_storemodulos')->name('admincliente.admincliente_storemodulos');    
});

Route::group(['prefix'=>'centros','namespace'=>'CentroCostos','middleware'=>'auth'], function(){ 
    route::get('/ver','CentroCostosController@index')->name('centros.index'); 
    route::post('/crear','CentroCostosController@store')->name('centros.store'); 

});


Route::group(['prefix'=>'unidadnegocio','namespace'=>'UnidadNegocio'], function(){

    Route::get('/index','UnidadNegocioController@index')->name("unidadnegocio.index"); 
    Route::get('/index/asignados','UnidadNegocioController@indexAreActural')->name("unidadnegocio.indexAreActural"); 
    Route::post('/create','UnidadNegocioController@store')->name("unidadnegocio.store"); 
    Route::get('/gestion/{unidad}','UnidadNegocioController@gestionarUnidad')->name("unidadnegocio.gestion");
    Route::post('/create/area/{dependencia}','UnidadNegocioController@storeArea');
    Route::post('/create/dependencia/{unidadNegocio}','UnidadNegocioController@storeDependencia');
    Route::post('/create/asignacionarea/{area}','UnidadNegocioController@asignacionEmpleado');

   // ajax
   Route::get('/unidad/dependencia/{unidad}','UnidadNegocioController@dependenciaUnidad');
   Route::get('/dependencia/area/{area}','UnidadNegocioController@AreaDepedencia');
   Route::post('/asignar/area/grupal','UnidadNegocioController@asignacionGrupalEmpleados')->name("unidadnegocio.asignacionGrupalEmpleados");

});
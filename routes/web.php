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

Route::group(['prefix'=>'empleados','namespace'=>'GestionUsuarios','middleware'=>'auth'], function(){ 

    route::get('/ver/roles','RolesAdminClienteController@index')->name('rolesCliente.index');
    route::get('/crear/roles','RolesAdminClienteController@create')->name('rolesCliente.create');
    route::post('/almacenarrole','RolesAdminClienteController@store')->name('rolesCliente.store');
    route::get('/editar/{role}','RolesAdminClienteController@edit')->name('rolesCliente.edit');
    route::post('/actualizar/{role}','RolesAdminClienteController@update')->name('rolesCliente.update');


    route::get('/cliente','EmpleadosAdminClienteController@index')->name('empleadosadmincliente.index');
    route::get('/cliente/crear','EmpleadosAdminClienteController@create')->name('empleadosadmincliente.create');
    route::get('/cliente/ver/{id}','EmpleadosAdminClienteController@show')->name('empleadosadmincliente.show');
    route::post('/cliente/store','EmpleadosAdminClienteController@store')->name('empleadosadmincliente.store');
    route::get('/cliente/crear/anexo/{empleado}','EmpleadosAdminClienteController@createAnexo')->name('empleadosadmincliente.createAnexo');
    
    route::post('/cliente/update/{id}','EmpleadosAdminClienteController@update')->name('empleadosadmincliente.update');
    route::post('/cliente/borrar/{user}','EmpleadosAdminClienteController@destroy')->name('empleadosadmincliente.destroy');


});


Route::group(['prefix'=>'contratacion','namespace'=>'Contratacion','middleware'=>'auth'], function(){ 

   route::get('inicio','ContratosController@inicio')->name('contratacion.inicio');
   route::get('contratos','ContratosController@indexTipocontrato')->name('contratacion.indexTipocontrato');
   route::get('ver/contratos','ContratosController@indexContratos')->name('contratacion.indexContratos');
   route::get('crear/contrato','ContratosController@createContrato')->name('contratacion.createContrato');
   route::post('store/contrato','ContratosController@storeContrato')->name('contratacion.storeContrato');
   route::get('ver/clausulas/{contrato}','ContratosController@clausulaContrato')->name('contratacion.clausulaContrato');
   // clausulas

   route::get('clausulas','ContratosController@indexClausulas')->name('contratacion.indexClausulas');
   route::get('crear','ContratosController@createClausula')->name('contratacion.createClausula');
   route::post('store/clausula','ContratosController@storeClausula')->name('contratacion.storeClausula');


   // contratacion

   route::get('empleado/sin-asignacion/','ContratacionController@indexSinasignacion')->name('contratacion.indexSinasignacion');

   
});



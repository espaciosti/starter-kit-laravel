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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('error','HomeController@noAccess');


Route::get('datatable/perfiles','Web\PerfilController@dataperfil');
Route::resource('perfiles','Web\PerfilController');

Route::get('showmenus/{profile_id}/assign','Web\PerfilController@showRolmenu');
Route::post('asignamenus','Web\PerfilController@asignaMenu');

Route::get('datatable/usuarios','Web\UsuarioController@datausers');
Route::resource('usuarios','Web\UsuarioController');
Route::get('settings','Web\UsuarioController@settings');
Route::put('updateuser/{id}','Web\UsuarioController@updateUser');
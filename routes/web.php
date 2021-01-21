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
Route::resource('station','StationController');
Route::resource('estado','EstadoController');
Route::resource('channeltv','ChanneltvController');
Route::resource('users','UsersController');
Route::resource('estadoconfig','EstadoConfigController');
Route::resource('user','UserController');
Route::resource('map','MapController');
Route::resource('encargado','EncargadoController');
Route::resource('cpacc','CpaccController');
Route::resource('photo','PhotoController');

Route::post('encargado/crear/{station_id}', 'EncargadoController@store');

// Route::get('/', function () {

//     return view('inicio');
// });
Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

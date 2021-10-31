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
    return view('dashboards.home');
});


//Rutas de Usuarios
Route::get('config/users'                           , 'UserController@list')->name('users.list');
Route::get('config/users/getdata'                   , 'UserController@getdata');
Route::get('config/users/add'                       , 'UserController@add');
Route::get('config/users/{user_id}'                 , 'UserController@edit');

Route::post('config/users/store'                    , 'UserController@store');

//Rutas Sesion
Route::get('sesion/changepassword'                 , 'UserController@changePassword');
Route::post('sesion/changepassword/process'         , 'UserController@changePasswordProcess');
Route::get('sesion/close'                          , 'UserController@changepassword');
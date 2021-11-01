<?php

use Illuminate\Support\Facades\Route;

Route::get('/'                                          , 'MainController@login');
Route::post('sesion/checklogin'                         , 'MainController@checkLogin');

Route::get('sesion/passwordlost'                        , 'MainController@passwordLost');
Route::post('sesion/passwordlost/process'               , 'MainController@passwordLostProcess');

Route::get('sesion/passwordreset/{user_id}/token/{token}'           , 'MainController@passwordReset');
Route::post('sesion/passwordreset/{user_id}/token/{token}/process'  , 'MainController@passwordResetProcess');

//ESTAS RUTAS NECESITAN ESTAR LOGUEADO
Route::group(['middleware' => ['auth']], function() {

    //Rutas de Usuarios
    Route::get('config/users'                           , 'UserController@list')->name('users.list');
    Route::get('config/users/getdata'                   , 'UserController@getdata');
    Route::get('config/users/add'                       , 'UserController@add');
    Route::get('config/users/{user_id}'                 , 'UserController@edit');

    Route::post('config/users/store'                    , 'UserController@store');

    //Rutas Sesion
    Route::get('sesion/changepassword'                  , 'UserController@changePassword');
    Route::post('sesion/changepassword/process'         , 'UserController@changePasswordProcess');
    Route::get('sesion/close'                           , 'UserController@changepassword');
});
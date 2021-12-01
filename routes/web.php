<?php

use Illuminate\Support\Facades\Route;

Route::get('/'                                          , 'SesionController@home')->name('login');
Route::post('sesion/login'                              , 'SesionController@login');

Route::get('sesion/passwordlost'                        , 'SesionController@passwordLost');
Route::post('sesion/passwordlost/process'               , 'SesionController@passwordLostProcess');

Route::get('sesion/passwordreset/{user_id}/token/{token}'           , 'SesionController@passwordReset');
Route::post('sesion/passwordreset/{user_id}/token/{token}/process'  , 'SesionController@passwordResetProcess');


Route::group(['middleware' => ['auth']], function() {

    //Rutas Sesion
    Route::get('sesion/passwordchange'                  , 'SesionController@passwordChange');
    Route::post('sesion/passwordchange/process'         , 'SesionController@passwordChangeProcess');
    Route::get('sesion/logout'                          , 'SesionController@logout');

    //Rutas de Usuarios
    Route::get('config/users'                           , 'UserController@list')->name('users.list');
    Route::get('config/users/getdata'                   , 'UserController@getdata');
    Route::get('config/users/add'                       , 'UserController@add');
    Route::get('config/users/{user_id}'                 , 'UserController@edit');
    Route::post('config/users/store'                    , 'UserController@store');

});

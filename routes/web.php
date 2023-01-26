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
    Route::get('admin/user'                           , 'UserController@list')->name('user.list');
    Route::get('admin/user/getdata'                   , 'UserController@getdata');
    Route::get('admin/user/add'                       , 'UserController@add');
    Route::get('admin/user/{user_id}'                 , 'UserController@edit');
    Route::post('admin/user/store'                    , 'UserController@store');

    //Rutas Client
    Route::get('admin/client',            'ClientController@list')->name('clients.list');
    Route::get('admin/client/getdata',    'ClientController@getdata');

    Route::get('admin/client/{id}',           'ClientController@select');
    Route::get('admin/client/{id}/delete',    'ClientController@delete');
    Route::post('admin/client/store',         'ClientController@store');

});

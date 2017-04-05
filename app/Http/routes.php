<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
// =========================== BEGIN SERVICIO  ===============================
Route::resource('servicios','ServicioController');

// =========================== END SERVICIO  ===============================

Route::resource('horario_ns','Horario_nController');
Route::get('horario_ns/{origen}/{destino}/consulta',[
  'uses'  => 'Horario_nController@consulta',
  'as'    => 'horario_ns.consulta',
]);

// =========================== BEGIN FRANCO  ===============================
Route::resource('franco','FrancoController');

// Route::get('franco/create',[
//   'uses'  =>  'FrancoController@create',
//   'as'    =>   'francos.create',
// ]);
//
// Route::get('franco/{franco}/show',[
//   'uses'  =>  'FrancoController@show',
//   'as'    =>   'francos.show',
// ]);
//
//
// Route::get('franco/{franco}/edit',[
//   'uses'  =>  'FrancoController@edit',
//   'as'    =>   'francos.edit',
// ]);
//
//
// Route::get('franco/{franco}/destroy',[
//   'uses'  =>  'FrancoController@destroy',
//   'as'    =>  'francos.destroy',
// ]);
//
//
// Route::get('franco/{franco}',[
//   'uses'  =>  'FrancoController@update',
//   'as'    =>  'francos.update',
// ]);
//
//
// Route::get('franco/store',[
//   'uses'  =>  'FrancoController@store',
//   'as'    =>  'francos.store',
// ]);
//
//
// Route::get('franco',[
//   'uses'  =>  'FrancoController@index',
//   'as'    =>  'francos.index',
// ]);

// =========================== END FRANCO  ===============================

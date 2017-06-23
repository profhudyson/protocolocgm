<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});






Route::resource('departamentos', 'DepartamentoAPIController');



Route::resource('org_externos', 'OrgExternoAPIController');





Route::resource('departamentos', 'DepartamentoAPIController');



Route::resource('org_externos', 'OrgExternoAPIController');





Route::resource('documentos', 'DocumentoAPIController');

Route::resource('tramitacaos', 'TramitacaoAPIController');

Route::resource('usuarios', 'UsuarioAPIController');
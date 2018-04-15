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


Route::group(['prefix' => '/'], function() {
    
    Route::get('/ajuda','Controller@homepage');
    Route::get('/','LoginController@fazerLogin');
    Route::post('/verificarLogin', 'LoginController@verificarLogin')->name('validarLogin');
    
});

Route::group(['prefix' => 'cliente'], function() {
    
    Route::post('/Cadastrar','LoginController@verificaLogin'); // mudar isso para controler do cliente
    
});


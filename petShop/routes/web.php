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
    Route::post('/TelaPrincipal', 'LoginController@verificarLogin')->name('validarLogin');
    Route::post('/', 'LoginController@sair')->name('redirecionarPagina');
    
});

Route::group(['prefix' => 'cliente'], function() {
    
    Route::get('/Cadastrar','ProprietarioController@chamarTelaCadastroCliente')->name('cadastrarDono');
    Route::get('/ProcurarDono','ProprietarioController@chamarTelaProcurarClientes')->name('procurarDono');
    Route::post('/SalvarCliente','ProprietarioController@addNovoCliente')->name('salvarDono');
    
});


Route::group(['prefix' => 'animal'], function() {
    
    
    Route::get('/Cadastrar','AnimalController@chamarTelaCadastroAnimal')->name('cadastrarAnimal');
    
});


Route::get('/Caixa','CaixaController@abrirCaixa')->name('abrirCaixa');

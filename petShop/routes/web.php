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
    Route::get('/','LoginController@login')->name('paginaInicial');
    Route::post('/Logar', 'LoginController@logar')->name('validarLogin');
    Route::post('/', 'LoginController@sair')->name('sair');
    Route::get('/TelaPrincipal', 'LoginController@redirecionarPagina')->name('paginaPrincipal')->middleware('login');
});

Route::group(['prefix' => 'cliente','middleware' => ['login']], function() {
    
    Route::get('/Cadastrar','ProprietarioController@chamarTelaCadastroCliente')->name('cadastrarDono');
    Route::get('/ProcurarDono','ProprietarioController@chamarTelaProcurarClientes')->name('procurarDono');
    Route::post('/SalvarCliente','ProprietarioController@addNovoCliente')->name('salvarDono');
});


Route::group(['prefix' => 'animal','middleware' => ['login']], function() {
    
    Route::get('/Cadastrar','AnimalController@chamarTelaCadastroAnimal')->name('cadastrarAnimal');
    Route::post('/SalvarAnimal','AnimalController@addNovoAnimal')->name('salvarAnimal');
});


Route::get('/Caixa','CaixaController@abrirCaixa')->name('abrirCaixa')->middleware('login');

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
    Route::post('/logar', 'LoginController@logar')->name('validarLogin');
    Route::post('/', 'LoginController@sair')->name('sair');
    Route::get('/telaPrincipal', 'LoginController@redirecionarPagina')->name('paginaPrincipal')->middleware('login');
});

Route::group(['prefix' => 'cliente','middleware' => ['login']], function() {
    
    Route::get('/cadastrar','ProprietarioController@chamarTelaCadastroCliente')->name('cadastrarDono');
    Route::get('/procurarDono','ProprietarioController@chamarTelaProcurarClientes')->name('procurarDono');
    Route::post('/salvarCliente','ProprietarioController@addNovoCliente')->name('salvarDono');
    Route::get('/mostrarCliente/{id}','ProprietarioController@mostrarCliente')->name('showCliente');
    Route::post('/editarCliente/{id}','ProprietarioController@editarCliente')->name('atualizarCliente');
    Route::get('excluirCliente/{id}','ProprietarioController@deletarCliente')->name('excluirCliente');
});


Route::group(['prefix' => 'animal','middleware' => ['login']], function() {
    
    Route::get('/cadastrar','AnimalController@chamarTelaCadastroAnimal')->name('cadastrarAnimal');
    Route::post('/salvarAnimal','AnimalController@addNovoAnimal')->name('salvarAnimal');
    Route::get('/procurarAnimais','AnimalController@mostrarTodosAnimais')->name('procurarAnimais');
    Route::get('/mostrarAnimal/{id}','AnimalController@mostrarAnimal')->name('showAnimal');
    Route::post('/editarAnimais/{id}','AnimalController@editarAnimal')->name('atualizarAnimal');
    Route::get('excluirAnimal/{id}','AnimalController@deletarAnimal')->name('excluirAnimal');
});


Route::get('/Caixa','CaixaController@abrirCaixa')->name('abrirCaixa')->middleware('login');

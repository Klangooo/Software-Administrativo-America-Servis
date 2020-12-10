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
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/usuario', 'HomeController@usuario')->name('usuario');

    Route::get('/funcionario', 'HomeController@funcionario')->name('funcionario');

    Route::get('/ponto', 'HomeController@ponto')->name('ponto');
    Route::delete('/ponto', 'PontosController@destroyALL');

    Route::get('/home', 'HomeController@index')->name('home'); 
    
    Route::get('/cadastro_usuario', 'HomeController@cadastro_usuario')->name('cadastro_usuario');
    Route::post('/cadastro_usuario', 'HomeController@cadastro_usuario_do')->name('cadastro_usuario_do');
    
    Route::resource('/funcionarios', 'FuncionariosController');
    Route::resource('/usuario', 'UsuarioController');
    Route::resource('/ponto', 'PontosController');  
});  

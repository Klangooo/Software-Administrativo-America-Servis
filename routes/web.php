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

Route::get('/funcionario', 'HomeController@funcionario')->name('funcionario');

Route::get('/usuario', 'HomeController@usuario')->name('usuario');

Route::get('/ponto', 'HomeController@ponto')->name('ponto');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/funcionarios', 'FuncionariosController');
Route::resource('/usuario', 'UsuarioController');


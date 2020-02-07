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

Route::get('/', 'ContatosController@index');

Auth::routes();

Route::get('/home', 'ContatosController@index')->name('home');
Route::post('/criar-contato', 'ContatosController@store')->name('armazenar.contato');
Route::get('/remover-contato/{id}', 'ContatosController@destroy')->name('remover.contato');
Route::get('/informacoes-do-contato/{id}', 'ContatosController@show')->name('detalhar.contato');
Route::post('/editar-contato', 'ContatosController@update')->name('editar.contato');

Route::get('criar-tarefa', 'TodoController@store')->name('criar.tarefa');
Route::get('remover-tarefa/{id}', 'TodoController@destroy')->name('remover.tarefa');

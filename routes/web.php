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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {
	return view('master/home');
});

Route::get('/cursos', 'CursosController@index')->name('cursos.index');

Route::get('/disciplinas', function() {
    return view('disciplinas/index');
});

Route::get('/disciplinas/create', function() {
    return view('disciplinas/form');
});

Route::get('/turmas', function() {
    return view('turmas/index');
});

Route::get('/turmas/create', function() {
    return view('turmas/form');
});


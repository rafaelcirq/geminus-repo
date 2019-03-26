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

Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('/login', 'MainController@index')->name('entrar');
Route::get('/logout', 'MainController@logout');

Route::get('/geminus', 'MainController@sucesso');

Route::get('/esqueceusenha','EmailController@index');
Route::post('/esqueceusenha', 'EmailController@validaremail');

Route::get('/cadastrarusuario','UsuarioController@index');
Route::post('/cadastrarusuario','UsuarioController@cadastrar');
Route::get('cadastrarusuario/{id}','UsuarioController@editar');

Route::get('excluirusuario/{id}','UsuarioController@excluir');

Route::post('/alterarusuario','UsuarioController@alterar');

Route::get('/listarusuario','UsuarioController@listar');


Route::get('/trocarsenha','UsuarioController@trocarSenha');
Route::post('/trocarsenha','UsuarioController@alterarSenha');


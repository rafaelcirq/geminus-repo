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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'DisciplinasController@equivalencias');
    Route::get('/login', 'MainController@index');
    Route::post('/login/checklogin', 'MainController@checklogin');
    Route::get('/login', 'MainController@index')->name('login');
    Route::get('/esqueceusenha', 'EmailController@index');
    Route::post('/esqueceusenha', 'EmailController@validaremail');

    Route::get('equivalencias', "DisciplinasController@equivalencias");
    Route::get('equivalencias/{id}', "DisciplinasController@getEquivalencias");
});


 Route::group(['middleware' => ['auth']], function () {
   
    Route::get('/home', 'DisciplinasController@equivalencias');
    Route::get('equivalencias/{id}', "DisciplinasController@getEquivalencias");
    Route::get('/cadastrarusuario', 'UsuarioController@index');
    Route::post('/cadastrarusuario', 'UsuarioController@cadastrar');
    Route::get('cadastrarusuario/{id}', 'UsuarioController@editar');

    Route::get('excluirusuario/{id}', 'UsuarioController@excluir');

    Route::post('/alterarusuario', 'UsuarioController@alterar');

    Route::get('/listarusuario', 'UsuarioController@listar');
    Route::post('/listarusuario', 'UsuarioController@list');

    Route::get('/trocarsenha', 'UsuarioController@trocarSenha');
    Route::post('/trocarsenha', 'UsuarioController@alterarSenha');

    Route::get('/logout', 'MainController@logout');

    Route::resource('cursos', 'CursosController');

    Route::resource('matrizes', 'MatrizesController');

    Route::resource('professores', 'ProfessoresController');
    Route::resource('turmas', "TurmasController");
    Route::get('turma-horarios/{id}', "TurmasController@getHorarios");
});
    Route::resource('disciplinas', "DisciplinasController");
    Route::get('disciplinas/{id}/matriz', "DisciplinasController@getDisciplinasByMatriz");
    Route::get('equivalencias', "DisciplinasController@equivalencias");
    Route::get('equivalencias/{id}', "DisciplinasController@getEquivalencias");
    
   
    
 //});
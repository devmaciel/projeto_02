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


//INDEX
Route::get('/', 'homeController@index')->name('index');


//------------------------------------------------------
// Usuário - Login
Route::get('/login', 'homeController@pgLogin')
    ->name('usuario_form_login');

Route::post('/efetuar-login', 'homeController@executarLogin')
    ->name('usuario_form_executar-login');


//---------------------------------------------------------
// Usuário - Nova Conta
Route::get('/nova-conta', 'homeController@formCriarNovaConta')
    ->name('usuario_criar_nova_conta');

 Route::post('/efetuar-nova-conta', 'homeController@executarCriacaoDeNovaConta')
    ->name('usuario_executar_criar_nova_conta');


//---------------------------------------------------------
// Usuário - Editar Perfil
Route::get('/editar_perfil', 'homeController@editarPerfil')
    ->name('usuario_editar_perfil');

Route::post('/efetuar-editar_perfil', 'homeController@efetuarEditarPerfil')
->name('usuario_efetuar_editar_perfil');

//---------------------------------------------------------
// Usuário - Administrador
Route::get('/painel_admin', 'painelController@painelAdmin')
    ->name('usuario_painel_admin');

Route::get('/painel_admin_adicionar', 'painelController@painelAdminAdicionar')
    ->name('usuario_painel_admin_adicionar');

Route::post('/painel_admin_adicionar', 'painelController@painelAdminEfetuarAdicionar')
    ->name('usuario_painel_admin_efetuar_adicionar');


Route::get('/painel_admin_mostrar', 'painelController@painelAdminMostrar')
    ->name('usuario_painel_admin_mostrar');

Route::get('/painel_admin_editar/{id}', 'painelController@painelAdminEditar')
    ->name('usuario_painel_admin_editar');

Route::post('/painel_admin_editar/{id}', 'painelController@painelAdminEfetuarEditar')
    ->name('usuario_painel_admin_efetuar_editar');

Route::get('/painel_admin_deletar/{id}', 'painelController@painelAdminDeletar')
    ->name('usuario_painel_admin_deletar');



//---------------------------------------------------------
// Usuário - Logout
Route::get('usuario_logout', 'homeController@logout')
    ->name('logout');

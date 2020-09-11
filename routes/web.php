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
// Usuário - Logout
Route::get('usuario_logout', 'homeController@logout')
    ->name('logout');

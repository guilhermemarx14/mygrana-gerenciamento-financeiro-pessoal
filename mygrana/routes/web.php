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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::resource('/transacao','TransacaoController');

Route::get('/transacoesfiltradas','TransacaoController@indexFiltrado')->name('indexfiltrado');

Route::get('pic/{id}', 'FotoController@showPicture');
Route::get('add', 'FotoController@addPicture')->name('addPic');
Route::post('add', 'FotoController@savePicture')->name('add');

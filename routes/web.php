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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('contact/{id}/delete', 'ContactController@delete');
Route::get('contact/{id}/edit', 'ContactController@edit');
Route::get('contact/add', 'ContactController@add');
Route::post('contact/{id}/update', 'ContactController@update');

// It is POST, since it comes from a form post
Route::post('contact/save', 'ContactController@save'); 
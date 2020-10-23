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

Route::get('/login', 'LoginController@index');

//dibawah ini adalah Routing CRUD secara manual, ada cara yang lebih mudah 
/* Route::get('/artikel', 'ArtikelController@index');
Route::get('/artikel/create', 'ArtikelController@create');
Route::get('/artikel/{detail}', 'ArtikelController@detail');
Route::post('/artikel', 'ArtikelController@store');
Route::get('/artikel/{id}/edit', 'ArtikelController@edit');
Route::put('/artikel/{id}', 'ArtikelController@update');
Route::delete('/artikel/{id}', 'ArtikelController@destroy'); */
// yaitu : 
Route::resource('artikel', 'ArtikelController');


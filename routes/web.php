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

Route::get('/', 'WelcomeController@index');

Route::get('/presentation', 'WelcomeController@index');

Route::get('concerts', 'ConcertsController@concerts');

// route qui récupère les traductions
Route::get('langage', 'PagesController@language');

// Route pour l'authentification
Auth::routes(['register' => false]);

// Route pour le CRUD de l'administration (contenu des pages)
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/{pages}', 'HomeController@show')->name('home');

Route::get('/home/{page}/edit', 'HomeController@edit')->name('home');

Route::post('/home/{page}/edit/update', 'HomeController@update')->name('home');

/* CRUD for concerts */
Route::get('/home/{page}/edit/{id}', 'ConcertsController@edit')->name('home');

Route::post('/home/{page}/edit/{id}', 'ConcertsController@update')->name('home');

Route::get('/home/{page}/add/concert', 'ConcertsController@form')->name('home');

Route::post('/home/{page}/add/concert/save', 'ConcertsController@add')->name('home');

Route::post('/home/{page}/del/concert/{id}', 'ConcertsController@del')->name('home');


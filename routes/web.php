<?php

// Front routes
Route::get('/', 'WelcomeController@index');

Route::get('presentation', 'WelcomeController@index');

Route::get('concerts', 'ConcertsController@concerts');

Route::get('medias', 'MediasController@medias');

Route::get('contact',
    ['as' => 'contact', 'uses' => 'ContactController@contact']);
Route::post('contact',
    ['as' => 'contact_post', 'uses' => 'ContactController@contactPost']);

Route::get('liens', 'LinksController@links');

Route::get('mentions', 'PagesController@mentions');

Route::get('sitemap', 'PagesController@sitemap');

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

/* CRUD for medias */
Route::get('/home/{page}/edit-media/{id}', 'MediasController@edit')->name('home');

Route::post('/home/{page}/edit-media/{id}', 'MediasController@update')->name('home');

Route::post('/home/{page}/edit-media/{id}/image', 'FileController@postResizeImage')->name('home');

Route::get('/home/{page}/add/media', 'MediasController@form')->name('home');

Route::post('/home/{page}/add/media/save', 'MediasController@add')->name('home');

Route::post('/home/{page}/del/media/{id}', 'MediasController@del')->name('home');

/* CRUD for links */
Route::get('/home/{page}/edit-link/{id}', 'LinksController@edit')->name('home');

Route::post('/home/{page}/edit-link/{id}', 'LinksController@update')->name('home');

Route::get('/home/{page}/add/link', 'LinksController@form')->name('home');

Route::post('/home/{page}/add/link/save', 'LinksController@add')->name('home');

Route::post('/home/{page}/del/link/{id}', 'LinksController@del')->name('home');

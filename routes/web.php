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

// Annule la route register
Auth::routes(['register' => false]);

// Route pour le CRUD de l'administration (contenu des pages)
Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/{page}', 'AdminController@show')->name('page');

Route::get('/admin/{page}/edit-page', 'AdminController@edit')->name('edit-page');

Route::post('/admin/{page}/edit-page', 'AdminController@update')->name('update-page');

/* CRUD for concerts */
Route::get('/admin/{page}/edit-concert/{id}', 'ConcertsController@edit')->where('id', '[0-9]+')->name('edit-concert');

Route::post('/admin/{page}/edit-concert/{id}', 'ConcertsController@update')->where('id', '[0-9]+')->name('update-concert');

Route::get('/admin/{page}/add/concert', 'ConcertsController@form')->name('add-concert');

Route::post('/admin/{page}/add/concert', 'ConcertsController@add')->name('save-concert');

Route::post('/admin/{page}/del/concert/{id}', 'ConcertsController@del')->where('id', '[0-9]+')->name('del-concert');

/* CRUD for medias */
Route::get('/admin/{page}/edit-media/{id}', 'MediasController@edit')->where('id', '[0-9]+')->name('edit-media');

Route::post('/admin/{page}/edit-media/{id}', 'MediasController@update')->where('id', '[0-9]+')->name('update-media');

Route::get('/admin/{page}/add/media/{cat}', 'MediasController@form')->name('add-media');

Route::post('/admin/{page}/add/media/{cat}', 'MediasController@add')->name('save-media');

Route::post('/admin/{page}/del/media/{id}', 'MediasController@del')->where('id', '[0-9]+')->name('del-media');

/* CRUD for links */
Route::get('/admin/{page}/edit-link/{id}', 'LinksController@edit')->where('id', '[0-9]+')->name('edit-link');

Route::post('/admin/{page}/edit-link/{id}', 'LinksController@update')->where('id', '[0-9]+')->name('update-link');

Route::get('/admin/{page}/add/link', 'LinksController@form')->name('add-link');

Route::post('/admin/{page}/add/link', 'LinksController@add')->name('save-link');

Route::post('/admin/{page}/del/link/{id}', 'LinksController@del')->where('id', '[0-9]+')->name('del-link');

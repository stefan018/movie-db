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
    return view('index');
});
Route::resource('/movies', 'MoviesController');

Route::resource('/series', 'SeriesController');

Route::resource('/genres', 'GenresController')->middleware(['admin', 'auth']);

Route::resource('/cast', 'CastController');

Route::resource('/users', 'UsersController')->middleware(['admin', 'auth']);

Auth::routes();

Route::get('/search/general', 'SearchController@search')->name('search');
Route::get('/home', 'HomeController@index')->name('home');

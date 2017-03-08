<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/albums', 'AlbumsController@index');
Route::post('/albums', 'AlbumsController@store');
Route::get('/albums/{id}', 'PhotosController@index');
Route::post('/albums/{id}', 'PhotosController@store');
Route::post('/albums/delete/album', 'AlbumsController@deleteAlbum');
Route::post('/albums/delete/photo', 'PhotosController@deletePhoto');
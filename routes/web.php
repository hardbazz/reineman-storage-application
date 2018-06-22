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
Route::get('/home', 'HomeController@index')->name('home');

// Routes for clients
Route::get('/clients', 'ClientController@index');
Route::get('/clients/create', 'ClientController@create');
Route::get('/clients/{id}/edit', 'ClientController@edit');
Route::post('/clients', 'ClientController@store');
Route::patch('clients/edit/{id}', 'ClientController@update');
Route::delete('clients/{id}', 'ClientController@destroy');
Route::get('/client/{id}', 'ClientController@show');

// Routes for boats
Route::get('/boats', 'BoatController@index');
Route::get('/boats/create', 'BoatController@create');
Route::get('/boats/{id}/edit', 'BoatController@edit');
Route::post('/boats', 'BoatController@store');
Route::patch('boats/edit/{id}', 'BoatController@update');
Route::delete('boats/{id}', 'BoatController@destroy');
Route::get('/boats/{id}', 'BoatController@show');

// Routes for storage
Route::get('/', 'StorageController@index');
Route::get('/storage/create', 'StorageController@create');
Route::get('/storage/{id}/add', 'StorageController@addStorage');
Route::get('/storage/{id}/edit', 'StorageController@edit');
Route::post('/storage', 'StorageController@store');
Route::patch('storage/edit/{id}', 'StorageController@update');
Route::patch('updateStorage/edit/{id}', 'StorageController@updateStorage');
Route::patch('updateStorage/{id}', 'StorageController@clearStorage');
Route::get('/storage/{id}', 'StorageController@show');
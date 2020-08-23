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

Route::get('/create', function (){
    return view('create ');
});




Route::get('/', 'CreatesController@index')->name('home');

Route::post('/insert', 'CreatesController@insert')->name('create');
Route::get('/update/{id}', 'CreatesController@update');
Route::post('/edit/{id}', 'CreatesController@edit'); 
Route::get('/read/{id}', 'CreatesController@read');
Route::get('/delete/{id}', 'CreatesController@delete');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

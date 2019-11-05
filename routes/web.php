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

Route::get('/', 'NoteController@index')->name('index');
Route::post('/store', 'NoteController@store')->name('note.store');
Route::post('/view/{code}', 'NoteController@view')->name('note.view');

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
Route::post('/view', 'NoteController@view')->name('note.view.post');
Route::get('/view', 'NoteController@view')->name('note.view.get');
Route::get('/view/{code}', 'NoteController@viewDirectly')->name('note.view-directly');
Route::get('/diff/{code}', 'NoteController@viewDiff')->name('note.view-diff');
Route::post('/view/{code}', 'NoteController@viewDirectly')->name('note.view-directly.post');
Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/skip-tutorial', function () {
    Session::put('tutorial_succeed', true);
    return redirect()->back();
});

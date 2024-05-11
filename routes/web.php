<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\MainController@index');

// Route::get('/','MainController@index')->name('index');
Route::get('/create','MainController@create')->name('create');
Route::post('/store','MainController@store')->name('store');
Route::get('/edit','MainController@edit')->name('edit');
Route::post('/update','MainController@update')->name('update');
Route::get('/delete','MainController@delete')->name('delete');
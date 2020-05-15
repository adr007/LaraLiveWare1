<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'AppControl@home');
// Route::get('/data', 'AppControl@data');
Route::get('/data', 'MhsControl@index');
Route::get('/data/{student}', 'MhsControl@show');
Route::post('/data', 'MhsControl@store');
Route::delete('/data/hapus/{student}', 'MhsControl@destroy');
Route::patch('/data/update/{student}', 'MhsControl@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php
use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@index');
Route::get('/chapter/{chapter}','HomeController@chapter')->name('get-chapter');

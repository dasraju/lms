<?php
use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@index');
Route::get('/sub-cat-details/{type}/{id}','HomeController@chapter')->name('get-subcat-details');

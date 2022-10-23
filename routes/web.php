<?php
use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@index');
Route::get('/detailsmenu/{sub_id}','HomeController@detail_menu')->name('subject_details');
Route::get('/sub-cat-details/{type}/{id}','HomeController@chapter')->name('get-subcat-details');

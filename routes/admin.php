<?php
use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@index');
Route::resource('cats', 'CategoryController');
Route::resource('sub-cats', 'SubCategoryController');
Route::resource('sub-sub-cats', 'SubSubController');

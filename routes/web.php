<?php
use Illuminate\Support\Facades\Route;

Route::get('/','Frontend\HomeController@index');
Route::get('/user/login-form','Auth\AuthController@loginForm')->name('user.login.form')->middleware('auth.basic');

Route::post('/user/login','Auth\AuthController@login')->name('user.login.submit');

Route::get('/detailsmenu/{sub_id}','HomeController@detail_menu')->name('subject_details');
Route::get('/sub-cat-details/{type}/{id}','HomeController@chapter')->name('get-subcat-details');

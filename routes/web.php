<?php
use Illuminate\Support\Facades\Route;

Route::get('/','Frontend\HomeController@index');
Route::get('/user/login-form','Auth\AuthController@loginForm')->name('user.login.form');

Route::post('/user/login','Auth\AuthController@login')->name('user.login.submit');

Route::get('/detailsmenu/{sub_id}','Frontend\HomeController@detail_menu')->name('subject_details');
Route::get('/course-details/{course_id}','Frontend\HomeController@course_details')->name('course_details');
Route::get('/sub-cat-details/{type}/{id}','Frontend\HomeController@chapter')->name('get-subcat-details');
Route::get('/topic-files/{topic_id}','Frontend\HomeController@topic_files')->name('topic.files');
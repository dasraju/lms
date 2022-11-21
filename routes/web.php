<?php
use Illuminate\Support\Facades\Route;

Route::get('/','Frontend\HomeController@index')->name('user.home');
Route::get('/user/login','Frontend\Auth\AuthController@loginForm')->name('user.login.form');
Route::post('/user/login','Frontend\Auth\AuthController@login')->name('user.login');
Route::get('/user/logout','Frontend\Auth\AuthController@logout');


Route::get('/detailsmenu/{sub_id}','Frontend\HomeController@detail_menu')->name('subject_details');
Route::get('/course-list','Frontend\CourseController@courses')->name('course.list');
Route::get('/course-details/{course_id}','Frontend\CourseController@course_details')->name('course.details');
Route::get('/course-view/{course_id}','Frontend\CourseController@course_view')->name('course.view');
Route::get('/sub-cat-details/{type}/{id}','Frontend\HomeController@chapter')->name('get-subcat-details');
Route::get('/topic-files/{topic_id}','Frontend\HomeController@topic_files')->name('topic.files');
Route::get('/topical-deatils/{topical_id}','Frontend\HomeController@topical_details')->name('topical.details');
Route::get('/pastpaper-deatils/{paper_id}','Frontend\HomeController@paper_details')->name('pastpaper.details');
<?php
use Illuminate\Support\Facades\Route;


Route::get('login','Auth\AuthController@admin_login_form')->name('admin.login');
Route::post('login','Auth\AuthController@admin_login')->name('admin.login.submit');
Route::group([ 'middleware' => 'admin'], function() {
    Route::get('logout','Auth\AuthController@admin_logout')->name('admin.logout');
  
    Route::get('/','HomeController@index')->name('admin.home');
    Route::resource('menu-head', 'MenuHeadController');
    Route::resource('subject', 'SubjectController');
    Route::resource('cats', 'CategoryController');
    Route::resource('sub-cats', 'SubCategoryController');
    Route::resource('sub-sub-cats', 'SubSubController');
    Route::resource('chapter', 'ChapterController');
    Route::get('chapter/indexs/{type}', 'ChapterController@indexs')->name('chapter.indexs');
    Route::get('chapter/creates/{type}', 'ChapterController@creates')->name('chapter.creates');
    Route::resource('topic', 'TopicController');
    Route::resource('course', 'CourseController');
    Route::resource('notes', 'PdfNoteController');
    Route::resource('video-solution', 'VideoSolutionController');
    Route::resource('lesson', 'LessonController');
    Route::get('course/pending','Backend\CourseController@pendingCourse')->name('course.pending');
    //video and note downloaded from the same route
    Route::get('note/index/{id}', 'PdfNoteController@index')->name('note.index');
    Route::get('note/create/{id}', 'PdfNoteController@create')->name('note.create');
    // Route::get('video/index/{id}', 'VideoSolutionController@index')->name('video.index');
    Route::get('video/create/{id}', 'VideoSolutionController@create')->name('video.create');

    Route::get('status/change/{type}/{id}', 'HelperController@change_status')->name('admin.status.change');
});



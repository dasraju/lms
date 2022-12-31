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
    Route::resource('topical-chapter', 'TopicalChapterController');
    Route::get('chapter/indexs/{type}', 'ChapterController@indexs')->name('chapter.indexs');
    Route::get('chapter/creates/{type}', 'ChapterController@creates')->name('chapter.creates');
    Route::resource('topic', 'TopicController');
    Route::resource('course', 'CourseController');
    Route::resource('notes', 'PdfNoteController');
    Route::resource('parts', 'PartController');
    Route::resource('video-solution', 'VideoSolutionController');
    Route::resource('lesson', 'LessonController');
    Route::resource('topical-pdf', 'TopicalpdfController');
    Route::resource('topical-video', 'TopicalvideoController');
    Route::resource('folder', 'FolderController');
    Route::resource('folder-pdf', 'FolderPdfController');
    Route::resource('resource-pdf', 'ResourcePdfController');
    Route::resource('resource-folder-pdf', 'FolderPdfController');
    Route::get('course/pending','Backend\CourseController@pendingCourse')->name('course.pending');
    //video and note downloaded from the same route
    Route::get('topical-pdf/index/{id}', 'TopicalpdfController@index')->name('topical.pdf.index');
    Route::get('topical-pdf/create/{id}', 'TopicalpdfController@create')->name('topical.pdf.create');
    Route::get('note/index/{id}', 'PdfnoteController@index')->name('note.index');
    Route::get('note/create/{id}', 'PdfnoteController@create')->name('note.create');
    // Route::get('video/index/{id}', 'VideoSolutionController@index')->name('video.index');
    Route::get('video/create/{id}', 'VideoSolutionController@create')->name('video.create');
    Route::get('topical-video/create/{id}', 'TopicalvideoController@create')->name('topical.video.create');
    Route::get('status/change/{type}/{id}/{column}', 'HelperController@change_status')->name('admin.status.change');
    Route::get('user/list', 'UserController@user_list')->name('admin.user.list');
    Route::get('user/give-permission', 'UserController@give_permission')->name('user.give.permission');
    Route::post('user/give-permission/setup', 'UserController@set_permission')->name('user.permission.setup');
    Route::get('user/get/permission-data', 'UserController@get_permission_data')->name('user.get.permission.data');
});



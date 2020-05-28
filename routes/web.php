<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index');

Auth::routes();
Route::get('/login/{driver}', 'Auth\LoginController@social_login')->name('login.social');
Route::get('/login/{driver}/callback', 'Auth\LoginController@social_login_callback')->name('login.social.callback');

Route::prefix('project')->name('project.')->group(function () {

    Route::prefix('/{project}')->group(function () {
        Route::prefix('/version')->name('version.')->group(function () {
            Route::get('/create/{role}', 'VersionController@create')->name('create');
            Route::post('/{role}', 'VersionController@store')->name('store');
            Route::get('/{version}/edit', 'VersionController@edit')->name('edit');
            Route::put('/{version}', 'VersionController@update')->name('update');
            Route::delete('/{version}', 'VersionController@delete')->name('delete');
        });
        Route::prefix('/reply')->name('reply.')->group(function () {
            Route::post('/', 'ReplyController@store')->name('store');
            Route::put('/{reply}', 'ReplyController@update')->name('update');
            Route::delete('/{reply}', 'ReplyController@delete')->name('delete');
        });
        Route::prefix('/collaborator')->name('collaborator.')->group(function () {
            Route::post('/', 'CollaboratorController@store')->name('store');
            Route::get('/create', 'CollaboratorController@create')->name('create');
            Route::get('/', 'CollaboratorController@index')->name('index');
            Route::put('/{collaborator}', 'CollaboratorController@update')->name('update');
            Route::delete('/{collaborator}', 'CollaboratorController@delete')->name('delete');
        });
        Route::prefix('/like')->group(function() {
           Route::get('/', 'LikeController@show');
           Route::post('/', 'LikeController@store');
        });
    });

    Route::get('/create', 'ProjectController@create')->name('create');
    Route::get('/{board}', 'ProjectController@index')->name('index');
    Route::get('/{project}/edit', 'ProjectController@edit')->name('edit');
    Route::get('/{board}/{project}', 'ProjectController@show')->name('show');
    Route::post('/', 'ProjectController@store')->name('store');
    Route::put('/{project}', 'ProjectController@update')->name('update');
    Route::put('/{project}/status', 'ProjectController@update_status')->name('update_status');
    Route::put('/{project}/face', 'ProjectController@update_face')->name('update_face');
    Route::put('/{project}/complete', 'ProjectController@update_complete')->name('update_complete');
    Route::delete('/{project}', 'ProjectController@delete')->name('delete');

});

Route::prefix('post')->name('post.')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/create', 'PostController@create')->name('create');
    Route::get('/{post}', 'PostController@show')->name('show');
    Route::get('/{post}/edit', 'PostController@edit')->name('edit');
    Route::post('/', 'PostController@store')->name('store');
    Route::put('/{post}', 'PostController@update')->name('update');
    Route::delete('/{post}', 'PostController@delete')->name('delete');

    Route::prefix('/{post}')->group(function () {
        Route::prefix('/reply')->name('reply.')->group(function () {
            Route::post('/', 'ReplyController@store')->name('store');
            Route::put('/{reply}', 'ReplyController@update')->name('update');
            Route::delete('/{reply}', 'ReplyController@delete')->name('delete');
        });
    });
});

Route::prefix('user')->name('user.')->group(function () {

    Route::prefix('/{user}')->group(function() {
        Route::prefix('/follow')->name('follow.')->group(function() {
            Route::get('/{board}', 'FollowController@index')->name('index');
            Route::post('/', 'FollowController@store')->name('store');
            Route::delete('/', 'FollowController@delete')->name('delete');
        });
        Route::prefix('/{board}/exhibit')->name('exhibit.')->group(function() {
            Route::get('/create', 'ExhibitController@create')->name('create');
            Route::post('/', 'ExhibitController@store')->name('store');
            Route::get('/{exhibit}/edit', 'ExhibitController@edit')->name('edit');
            Route::put('/{exhibit}', 'ExhibitController@update')->name('update');
            Route::delete('/{exhibit}', 'ExhibitController@delete')->name('delete');
        });
    });

    Route::get('/{board}', 'UserController@index')->name('index');
    Route::get('/{user}/edit', 'UserController@edit')->name('edit');
    Route::get('/{board}/{user}', 'UserController@show')->name('show');
    Route::put('/{user}', 'UserController@update')->name('update');
    Route::put('/{user}/{board}/face', 'UserController@update_face')->name('update_face');
    Route::delete('/{user}', 'PostController@delete')->name('delete');
});

Route::prefix('lecture_category')->name('lecture_category.')->group(function () {
    Route::get('/', 'LectureCategoryController@index')->name('index');
    Route::get('/create', 'LectureCategoryController@create')->name('create');
    Route::get('/{lecture_category}', 'LectureCategoryController@show')->name('show');
    Route::get('/{lecture_category}/edit', 'LectureCategoryController@edit')->name('edit');
    Route::post('/', 'LectureCategoryController@store')->name('store');
    Route::put('/{lecture_category}', 'LectureCategoryController@update')->name('update');
    Route::delete('/{lecture_category}', 'LectureCategoryController@delete')->name('delete');

    Route::prefix('/{lecture_category}')->group(function () {
        Route::prefix('/reply')->name('reply.')->group(function () {
            Route::post('/', 'ReplyController@store')->name('store');
            Route::put('/{reply}', 'ReplyController@update')->name('update');
            Route::delete('/{reply}', 'ReplyController@delete')->name('delete');
        });
    });
});

Route::prefix('notice')->name('notice.')->group(function () {
    Route::get('/', 'NoticeController@index')->name('index');
    Route::get('/create', 'NoticeController@create')->name('create');
    Route::get('/{notice}', 'NoticeController@show')->name('show');
    Route::get('/{notice}/edit', 'NoticeController@edit')->name('edit');
    Route::post('/', 'NoticeController@store')->name('store');
    Route::put('/{notice}', 'NoticeController@update')->name('update');
    Route::delete('/{notice}', 'NoticeController@delete')->name('delete');
});

Route::prefix('qna')->name('qna.')->group(function () {
    Route::get('/', 'QnaController@index')->name('index');
    Route::get('/create', 'QnaController@create')->name('create');
    Route::post('/', 'QnaController@store')->name('store');
    Route::put('/{qna}/answer', 'QnaController@update_answer')->name('update_answer');
    Route::delete('/{qna}', 'QnaController@delete')->name('delete');
});







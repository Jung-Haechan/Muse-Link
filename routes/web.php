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

Route::prefix('project')->name('project.')->group(function(){

    Route::get('/create', 'ProjectController@create')->name('create');
    Route::get('/{board}', 'ProjectController@index')->name('index');
    Route::get('/{project}/edit', 'ProjectController@edit')->name('edit');
    Route::get('/{board}/{project}', 'ProjectController@show')->name('show');
    Route::post('/', 'ProjectController@store')->name('store');
    Route::put('/{project}', 'ProjectController@update')->name('update');
    Route::delete('/{project}', 'ProjectController@delete')->name('delete');

    Route::prefix('/{project}')->group(function(){
        Route::prefix('/version')->name('version.')->group(function(){
            Route::get('/create/{role}', 'VersionController@create')->name('create');
            Route::post('/{role}', 'VersionController@store')->name('store');
            Route::get('/{version}/edit', 'VersionController@edit')->name('edit');
            Route::put('/{version}', 'VersionController@update')->name('update');
            Route::delete('/{version}', 'VersionController@update')->name('delete');
        });
        Route::prefix('/reply')->name('reply.')->group(function(){
            Route::post('/', 'ReplyController@store')->name('store');
            Route::put('/{reply}', 'ReplyController@update')->name('update');
            Route::delete('/{reply}', 'ReplyController@update')->name('delete');
        });
    });
});

Route::prefix('post')->name('post.')->group(function(){
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/{post}', 'PostController@show')->name('show');
    Route::get('/create', 'PostController@create')->name('create');
    Route::get('/{post}/edit', 'PostController@edit')->name('edit');
    Route::post('/', 'PostController@create')->name('store');
    Route::put('/{post}', 'PostController@update')->name('update');
    Route::delete('/{post}', 'PostController@delete')->name('delete');

    Route::prefix('/{post}')->group(function(){
        Route::prefix('/reply')->name('reply.')->group(function(){
            Route::post('/', 'ReplyController@store')->name('store');
            Route::put('/{reply}', 'ReplyController@update')->name('update');
            Route::delete('/{reply}', 'ReplyController@update')->name('delete');
        });
    });
});




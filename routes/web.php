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

Route::get('/project/{board}/index', 'ProjectController@index')->name('project.index');
Route::get('/project/{board}/{project}', 'ProjectController@show')->name('project.show');
Route::resource('/project', 'ProjectController')->except(['index', 'show']);

Route::prefix('project/{project}')->name('project.')->group(function(){
    Route::get('/version/create/{role}', 'VersionController@create')->name('version.create');
    Route::post('/version/{role}', 'VersionController@store')->name('version.store');
    Route::resource('/version', 'VersionController')->only(['edit', 'update', 'destroy']);
});


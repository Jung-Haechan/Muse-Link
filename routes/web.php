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

Route::get('/music/{board}', 'ProjectController@index')->name('music.index');
Route::get('/music/{board}/{id}', 'ProjectController@show')->name('music.show');
Route::resource('/music', 'ProjectController')->except(['index', 'show']);




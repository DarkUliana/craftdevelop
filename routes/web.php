<?php

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

Route::get('/', 'MainController@index');

Route::get('blog', 'MainController@blog');

Route::get('roadmap', 'MainController@roadmap');
Route::get('roadmap/{tag}', 'MainController@roadmap');
Route::get('get-points', 'MainController@points');

Route::get('get-papers', 'MainController@papers');
Route::get('article/{id}', 'MainController@paper');

Route::get('policy', 'MainController@policy');




Route::get('setlocale/{locale}', 'MainController@setLocale');

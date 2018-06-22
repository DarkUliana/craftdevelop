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

Route::get('/', function () {
    return view('page', ['title' => 'Index page']);
});

Route::get('/blog', 'MainController@blog');
Route::get('/roadmap', 'MainController@roadmap');
Route::get('/policy', 'MainController@policy');
Route::get('/papers', 'MainController@papers');




Route::get('setlocale/{locale}', 'MainController@setLocale');

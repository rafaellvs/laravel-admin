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


Route::get('/', 'FrontController@index');

// Admin
Route::post('/admin', 'AdminController@login');

// Posts
Route::get('/admin/posts', 'PostsController@get');
Route::post('/admin/createpost', 'PostsController@create');

// Banners
Route::get('/admin/banners', 'BannersController@get');
Route::post('/admin/createbanner', 'BannersController@create');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

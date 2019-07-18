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
Route::get('/view-post/{post}', 'FrontController@show');

// Admin
Route::post('/admin', 'AdminController@login');

// Posts
Route::get('/admin/posts', 'PostsController@index');
Route::post('/admin/posts', 'PostsController@store');
Route::get('/admin/posts/create', 'PostsController@create');
Route::get('/admin/posts/{post}', 'PostsController@show');
Route::get('/admin/posts/{post}/edit', 'PostsController@edit');
Route::patch('/admin/posts/{post}', 'PostsController@update');
Route::delete('/admin/posts/{post}', 'PostsController@destroy');

// Banners
Route::get('/admin/banners', 'BannersController@index');
Route::post('/admin/banners', 'BannersController@store');
Route::get('/admin/banners/create', 'BannersController@create');
Route::get('/admin/banners/{banner}', 'BannersController@show');
Route::get('/admin/banners/{banner}/edit', 'BannersController@edit');
Route::patch('/admin/banners/{banner}', 'BannersController@update');
Route::delete('/admin/banners/{banner}', 'BannersController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

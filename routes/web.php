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


Route::get('/')->uses('HomeController@index')->name('home');
Route::get('home')->uses('HomeController@index')->name('home');
Route::get('ajax/other_post')->uses('PostController@other_post')->name('ajax_other_post');
Route::get('ajax/other_comment/{post_id}')->uses('PostController@other_comment')->name('ajax_other_post');

Route::post('ajax/login')->uses('Auth\LoginController@ajax_login')->name('ajax_login');


Route::get('detail/post/{alias}')->uses('PostController@detail_post')->name('home');

Route::get('tag/{alias}')->uses('PostController@tag')->name('home');

Route::post('comment/ajax_store/{post_id}')->uses('PostController@comment_ajax_store');



Route::get('login')->uses('Auth\LoginController@index')->name('login');
Route::post('login')->uses('Auth\LoginController@store')->name('login-store');
Route::get('register/user')->uses('Auth\RegisterController@index')->name('register-user');
Route::post('register/user')->uses('Auth\RegisterController@store')->name('register-user-save');


Route::get('admin/dashboard')->uses('Admin\DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('admin/post/create')->uses('Admin\PostController@create')->name('admin-post-create')->middleware('auth');
Route::post('admin/post/create')->uses('Admin\PostController@store')->name('admin-post-store')->middleware('auth');


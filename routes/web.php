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
// Replace admin with whatever prefix you need

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::get('/', 'backend\HomeController@index')->name('dashboard');
    Route::get('/dashboard', 'backend\HomeController@index')->name('dashboard');
    
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/category', 'HomeController@category')->name('category');
    Route::get('/blog-post', 'HomeController@blogPost')->name('blog-post');
});


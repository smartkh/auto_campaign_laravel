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
    Route::get('/', 'Backend\HomeController@index')->name('admin')->middleware('auth');
    Route::get('/dashboard', 'Backend\HomeController@index')->name('dashboard')->middleware('auth');
   
    // Route for ajax create user
    Route::post('/_post', 'Auth\RegisterController@store')->name('admin.user.register');

    Route::get('/_datatables/data-user', 'Backend\UserController@getData')->name('datatable.user.data');
    Route::get('/datatables', 'Backend\UserController@getIndex');
    
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/category', 'HomeController@category')->name('category');
    Route::get('/blog-post', 'HomeController@blogPost')->name('blog-post');
});


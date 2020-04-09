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
    # User Route
        // Route for creating a suer via Ajax request
        Route::post('register/ajax-user', 'Auth\RegisterController@store')->name('admin.user.register');

        // Rotue for user datatable
        Route::get('user/_datatables/data-user', 'Backend\UserController@getData')->name('datatable.user.data');
        // Route for view user index
        Route::get('user/datatables', 'Backend\UserController@getIndex');

        // delete single user
        Route::delete('user/{id}', ['as'=>'user.destroy','uses'=>'Backend\UserController@delete']);
        // delete multi selected checkbox user
        Route::get('user/destroy-many', 'Backend\UserController@destroyMany')->name('admin.multi.user.delete');

        //update/edit user via Ajax request
        Route::post('user/update', 'Backend\UserController@update')->name('admin.user.update');

    # Lat/lng Route
        Route::get('/lnglat/index', 'Backend\LngLatController@index')->name('lnglat')->middleware('auth');
        // Route::post('/lnglat/create', 'Backend\LngLatController@store')->name('lnglat.create');
        // Route::post('/ajax-gmaps', 'Backend\LngLatController@store')->name('admin.detect.create');
        // Route for creating a group via Ajax request
        Route::post('/ajax-group', 'Backend\UserGroupController@store')->name('admin.group.create');
        Route::get('/_group_datatable', 'Backend\UserGroupController@getData')->name('admin.group.data');

        // // Route for create user-group
        // Route::post('/user-group', 'Backend\UserGroupController@store')->name('admin.user-group.store');

    
    
});

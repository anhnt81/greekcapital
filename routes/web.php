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

/* Back-end */
Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin')->name('login');
Route::get('logout', 'LoginController@getLogout');

/*Group router for author and admin */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/', 'AdminController@getdashbroad')->name('dashbroad');
    /* Group for profile */
    Route::get('profile', 'ProfileController@getProfile');
    Route::post('profile/update', 'ProfileController@profileUpdate');

    /* Group post*/
    Route::prefix('post')->group(function () {
        Route::get('/', 'PostController@getList')->name('list-post');
        Route::get('add', 'PostController@getAdd');
        Route::put('updateStatus', 'PostController@updateStatus');
        Route::put('updateHot', 'PostController@updateHot');
        Route::post('add', 'PostController@postAdd');
        Route::get('update/{id}', 'PostController@getUpdate');
        Route::post('update/{id}', 'PostController@postUpdate');
        Route::get('delete/{id}', 'PostController@getDelete');
    });

    /* Group for admin */
    Route::middleware(['role'])->group(function () {
        /* Group category */
        Route::prefix('category')->group(function () {
            Route::get('/', 'CategoryController@getList');
            Route::get('add', 'CategoryController@getAdd');
            Route::post('add', 'CategoryController@postAdd');
            Route::get('data', 'CategoryController@dataTable')->name('data');
            Route::post('update', 'CategoryController@postUpdate');
            Route::delete('delete', 'CategoryController@delete');
        });
        /* Group file */
        Route::prefix('tag')->group(function () {
            Route::get('/', 'TagController@getList')->name('list-tag');
            Route::get('data', 'TagController@dataTable')->name('data-tag');
            Route::post('add', 'TagController@postAdd');
            Route::put('update', 'TagController@putUpdate');
            Route::delete('delete', 'TagController@delete');
        });
        /* Group author */
        Route::prefix('author')->group(function () {
            Route::get('/', 'AdminController@getList')->name('list-author');
            Route::get('data', 'AdminController@dataTable')->name('data-author');
            Route::post('add', 'AdminController@postAdd');
            Route::delete('delete', 'AdminController@delete');
        });
    });
});


/* Front-end */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/{lang?}', ['as' => 'lang', 'uses' => 'HomeController@getLanguage']);

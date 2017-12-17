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
        Route::get('/', 'GcapitalController@getList')->name('list-post');
        Route::get('add', 'GcapitalController@getAdd');
        Route::put('updateStatus', 'GcapitalController@updateStatus');
        Route::post('add', 'GcapitalController@postAdd');
        Route::get('update/{id}', 'GcapitalController@getUpdate');
        Route::post('update/{id}', 'GcapitalController@postUpdate');
        Route::get('delete/{id}', 'GcapitalController@getDelete');
    });

    /* Group for admin */
    Route::middleware(['role'])->group(function () {
        /* Group category */
        Route::prefix('category')->group(function () {
            Route::get('/', 'CategoryController@getList')->name('list-category');
            Route::get('add', 'CategoryController@getAdd');
            Route::post('add', 'CategoryController@postAdd');
            Route::get('data', 'CategoryController@dataTable')->name('data');
            Route::post('update', 'CategoryController@postUpdate');
            Route::delete('delete', 'CategoryController@delete');
        });
        /* Group employee */
        Route::prefix('employee')->group(function () {
            Route::get('/', 'EmployeeController@getList')->name('list-employee');
            Route::post('add', 'EmployeeController@postAdd')->name('add-employee');
            Route::put('updateStatus', 'EmployeeController@updateStatus');
            Route::get('update/{id}', 'EmployeeController@getUpdate');
            Route::post('update/{id}', 'EmployeeController@postUpdate');
            Route::delete('delete', 'EmployeeController@delete');
        });
        /* Group product */
        Route::prefix('product')->group(function () {
            Route::get('/', 'ProductController@getList')->name('list-product');
            Route::post('add', 'ProductController@postAdd')->name('add-product');
            Route::put('updateStatus', 'ProductController@updateStatus');
            Route::get('update/{id}', 'ProductController@getUpdate');
            Route::post('update/{id}', 'ProductController@postUpdate');
            Route::delete('delete', 'ProductController@delete');
        });
        /* Group author */
        Route::prefix('author')->group(function () {
            Route::get('/', 'AdminController@getList')->name('list-author');
            Route::get('data', 'AdminController@dataTable')->name('data-author');
            Route::post('add', 'AdminController@postAdd');
            Route::delete('delete', 'AdminController@delete');
        });
        /* Group content */
        Route::prefix('content')->group(function () {
            Route::get('/', 'ContentController@getList')->name('list-content');
            Route::get('data', 'ContentController@dataTable')->name('list-content');
            Route::post('add', 'ContentController@postAdd');
            Route::delete('delete', 'ContentController@delete');
        });
    });
});


/* Front-end */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::post('/contact', ['as' => 'form.contact', 'uses' => 'HomeController@postContact']);

Route::get('product', ['as' => 'product', 'uses' => 'HomeController@getProduct']);
Route::post('product', ['as' => 'postStep1', 'uses' => 'HomeController@postStep1']);

Route::get('step2', ['as' => 'step2', 'uses' => 'HomeController@getStep2']);
Route::post('step2', ['as' => 'postStep2', 'uses' => 'HomeController@postStep2']);

Route::get('step3', ['as' => 'step3', 'uses' => 'HomeController@getStep3']);


Route::get('email', ['as' => 'email', 'uses' => 'HomeController@getEmail']);
Route::get('/{lang?}', ['as' => 'lang', 'uses' => 'HomeController@getLanguage']);

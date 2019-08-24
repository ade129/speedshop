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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// users
Route::get('/users', 'UsersController@index')->name('profile');

// categories
Route::get('/categories', 'CategoriesController@index')->name('index');
Route::get('/categories/create-new', 'CategoriesController@create_page')->name('create_page');
Route::post('/categories/create-new', 'CategoriesController@save_page')->name('save_page');
Route::get('/categories/update/{categories}', 'CategoriesController@update_page')->name('edit');
Route::post('/categories/update/{categories}', 'CategoriesController@update_save')->name('update');


// sparepart
Route::get('/spareparts', 'SparepartsController@index')->name('index');
Route::get('/spareparts/create-new', 'SparepartsController@create_page')->name('create_page');
Route::post('/spareparts/create-new', 'SparepartsController@save_page')->name('save_page');
Route::get('/spareparts/update/{spareparts}', 'SparepartsController@update_page')->name('edit');
Route::post('/spareparts/update/{spareparts}', 'SparepartsController@update_save')->name('update');

//service
Route::get('/services', 'ServicesController@index')->name('index');
Route::get('/services/create-new', 'ServicesController@create_page')->name('create_page');
Route::post('/services/create-new', 'ServicesController@save_page')->name('save_page');
Route::get('/services/update/{service}', 'ServicesController@update_page')->name('edit');//service samakan dengan key yg ada pada controller
Route::post('/services/update/{service}', 'ServicesController@update_save')->name('update');




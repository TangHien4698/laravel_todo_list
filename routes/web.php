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
//user
Route::get('/','UserController@index')->name('homeuser_router')->middleware('check_login');;
Route::post('adduser','UserController@create');
Route::prefix('ajax')->group(function () {
    Route::post('delete_user','UserController@destroy');
    Route::post('delete_category','CategoryController@destroy');
    Route::post('delete_task','TaskController@destroy');
});
Route::post('edituser','UserController@edit');
Route::post('treat_dataedit','UserController@update')->name('treat_dataedit');
// category
Route::get('/category','CategoryController@index')->name('category');
Route::post('addcategory','CategoryController@store');
Route::post('editcategory','CategoryController@edit');
Route::post('treat_dataedit_category','CategoryController@update')->name('treat_dataedit');
// task
Route::get('/task','TaskController@index')->name('task');
Route::post('addtask','TaskController@store');
Route::post('edittask','TaskController@edit');
Route::post('treat_dataedit_task','TaskController@update');
Route::get('/login','Auth\LoginController@index')->name('login')->middleware('check_logout');;
Route::post('/postLogin','Auth\LoginController@login');
// register
Route::get('/register','Auth\RegisterController@index')->name('register')->middleware('check_logout');;
Route::post('/postRegister','Auth\RegisterController@create');

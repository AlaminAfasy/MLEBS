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
Route::get('/', 'FrontendController@index');
Route::get('/adminDashboard', 'FrontendController@adminDashboard')->name('adminDashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/student', 'StudentController@index')->name('student');
Route::get('/create', 'StudentController@create')->name('create');
Route::post('/store', 'StudentController@store')->name('store');
Route::get('/edit/{id}', 'StudentController@edit')->name('edit');
Route::post('/update/{id}', 'StudentController@update')->name('update');
Route::post('/delete/{id}', 'StudentController@delete')->name('delete');

Route::get('/invalid/{id}', 'UserController@invalid')->name('invalid');
Route::get('/valid/{id}', 'UserController@valid')->name('valid');
Route::post('/delete/{id}', 'UserController@delete')->name('delete');

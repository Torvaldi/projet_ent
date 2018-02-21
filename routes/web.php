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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/prof', 'ProfController@index')->name('prof_home')->middleware('auth');
Route::get('/prof/students', 'ProfStudentsController@index')->name('prof_users')->middleware('auth');
Route::get('/prof/students/{tdgroup}', 'ProfStudentsController@list_td')->name('prof_list_td_users')->middleware('auth');

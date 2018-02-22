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

Route::group(['prefix' => '/prof'], function (){
    Route::get('/', 'ProfController@index')->name('prof_home')->middleware('auth');
    Route::group(['prefix' => '/students'], function (){
        Route::get('/', 'ProfStudentsController@index')->name('prof_users')->middleware('auth');
        Route::get('/tdgroup/{tdgroup}', 'ProfStudentsController@list_td')->name('prof_list_td_users')->middleware('auth');
        Route::get('/tpgroup/{tpgroup}', 'ProfStudentsController@list_tp')->name('prof_list_tp_users')->middleware('auth');
        Route::get('/promotion/{promotion}', 'ProfStudentsController@list_promotion')->name('prof_list_promotion_users')->middleware('auth');
    });
});


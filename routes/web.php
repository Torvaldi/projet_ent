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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// /notes
Route::group(['prefix' => '/notes'], function (){
    Route::get('/', 'NoteController@index')->name('student_notes')->middleware('auth');
});

// /survey
Route::group(['prefix' => '/survey'], function (){
    Route::get('/', 'SurveyController@create')->name('create_survey')->middleware('auth');
    Route::post('/', 'SurveyController@store')->name('create_survey_post')->middleware('auth');
    Route::post('/vote', 'HomeController@vote')->name('vote_survey')->middleware('auth');
});

// /prof
Route::group(['prefix' => '/prof'], function (){
    Route::get('/', 'ProfController@index')->name('prof_home')->middleware('auth');

    // /prof/students
    Route::group(['prefix' => '/students'], function (){
        Route::get('/', 'ProfStudentsController@index')->name('prof_users')->middleware('auth');
        Route::get('/tdgroup/{tdgroup}', 'ProfStudentsController@list_td')->name('prof_list_td_users')->middleware('auth');
        Route::get('/tpgroup/{tpgroup}', 'ProfStudentsController@list_tp')->name('prof_list_tp_users')->middleware('auth');
        Route::get('/promotion/{promotion}', 'ProfStudentsController@list_promotion')->name('prof_list_promotion_users')->middleware('auth');
    });

    // /prof/notes
    Route::group(['prefix' => '/notes'], function (){
        Route::get('/', 'ProfNotesController@index')->name('prof_notes')->middleware('auth');

        // /prof/notes/students
        Route::group(['prefix' => '/students'], function (){
            Route::post('/get', 'ProfNotesController@get_students')->name('prof_students_get')->middleware('auth');
            Route::post('/post', 'ProfNotesController@post_notes')->name('prof_students_post')->middleware('auth');

            // /prof/notes/students/view
            Route::group(['prefix' => '/view'], function (){
                Route::get('/module/{module_id}', 'ProfNotesController@viewExams')->name('prof_students_view')->middleware('auth');
                Route::get('/module/{module_id}/notes/{exam_id}', 'ProfNotesController@viewNotes')->name('prof_students_view_notes')->middleware('auth');
            });

            // /prof/notes/students/note
            Route::group(['prefix' => '/note'], function (){
                Route::post('/edit/{note_id}', 'ProfNotesController@editNotePost')->name('prof_students_note_edit_post')->middleware('auth');
                Route::get('/edit/{note_id}', 'ProfNotesController@editNote')->name('prof_students_note_edit')->middleware('auth');
            });
        });
    });
});


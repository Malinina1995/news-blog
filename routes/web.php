<?php
    Auth::routes();

    Route::get('/add', function () {
        return view('addNewsPage');
    })->name('add');

    Route::post('/add', 'NewsController@addNews');

    Route::get('/news/{id}', 'NewsController@showNews')->name('newsLink');

    Route::get('/news/{id}/update', 'NewsController@updateNews')->name('updateLink');

    Route::get('/news/{id}/delete', 'NewsController@deleteNews')->name('deleteLink');

    Route::post('/news/{id}/exactlyDelete', 'NewsController@exactlyDelete')->name('exactlyDelete');

    Route::post('/news/{id}/update', 'NewsController@updateNewsSubmit')->name('updateNews');

    Route::get('/', 'NewsController@showAll')->name('home');

    Route::get('/home', 'HomeController@index');

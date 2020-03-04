<?php
    Auth::routes();

    Route::get('/add', function () {
        return view('addNewsPage');
    })->name('add')->middleware('auth');

    Route::post('/add', 'NewsController@addNews')->middleware('auth');

    Route::get('/news/{id}', 'NewsController@showNews')->name('newsLink');

    Route::get('/news/{id}/update', 'NewsController@updateNews')->name('updateLink')->middleware('auth');

    Route::get('/news/{id}/delete', 'NewsController@deleteNews')->name('deleteLink')->middleware('auth');

    Route::post('/news/{id}/exactlyDelete', 'NewsController@exactlyDelete')->name('exactlyDelete')->middleware('auth');

    Route::post('/news/{id}/update', 'NewsController@updateNewsSubmit')->name('updateNews')->middleware('auth');

    Route::get('/', 'NewsController@showAll')->name('home');

    Route::get('/home', 'HomeController@index');


    Route::get('/test', function () {
        $user = App\Models\User::find(1);
        $perm = App\Models\Permission::whereSlug('delete-news')->first();
        dd($user->hasPermissionTo($perm));
        dd($user->can('delete-news'));
    });

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


    Route::get('/text', function () {
        $user = App\Models\User::find(3);
//        dd($user->hasRole('web-developer')); // вернёт true
//        dd($user->hasRole('project-manager'));// вернёт false
//        dd($user->givePermissionsTo('manage-users'));
        $perm = \App\Models\Permission::whereSlug('manage-users')->first();
        dd($user->hasPermission($perm));// вернёт true;
    });

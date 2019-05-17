<?php


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//
//Route::group(['middleware' => 'auth'], function () {
////	Route::resource('user', 'UserController', ['except' => ['show']]);
////	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
////	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
////	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
////	Route::post('search', ['as' => 'name', 'uses' => 'UserController@search'])->name('user.search');
//});
//Route::post('user/search', 'UserController@search')->name('user.search');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/create', 'UserController@create')->name('user.create');
    Route::post('/store', 'UserController@store')->name('user.store');
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::put('/update/{id}', 'UserController@update')->name('user.update');
    Route::get('/show/{id}', 'UserController@show')->name('user.show');
    Route::get('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
    Route::post('/search', 'UserController@search')->name('user.search');

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['prefix' => 'cio', 'middleware' => 'auth'], function () {
    Route::get('/', 'CioController@index')->name('cio.index');
    Route::get('/create', 'CioController@create')->name('cio.create');
    Route::post('/store', 'CioController@store')->name('cio.store');
    Route::get('/edit/{id}', 'CioController@edit')->name('cio.edit');
    Route::put('/update/{id}', 'CioController@update')->name('cio.update');
    Route::get('/destroy/{id}', 'CioController@destroy')->name('cio.destroy');
    Route::post('/search', 'CioController@search')->name('cio.search');
});


    Route::group(['prefix' => 'flock', 'middleware' => 'auth'], function () {
        Route::get('/', 'FlockController@index')->name('flock.index');
        Route::get('/create', 'FlockController@create')->name('flock.create');
        Route::post('/store', 'FlockController@store')->name('flock.store');
        Route::get('/edit{id}', 'FlockController@edit')->name('flock.edit');
        Route::put('/update/{id}', 'FlockController@update')->name('flock.update');
        Route::get('/show/{id}', 'FlockController@show')->name('flock.show');
        Route::get('/destroy/{id}', 'FlockController@destroy')->name('flock.destroy');
        Route::post('/search', 'FlockController@search')->name('flock.search');
    });
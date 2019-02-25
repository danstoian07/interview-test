<?php

Auth::routes(['verify' => true]);
//overwrite routes
Route::get('/logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/image/{id}', 'HomeController@show')->name('show.image');

//dashboard protected routes
Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'verified'] ], function () {

    Route::resource('content', 'ScheduleContentController');

});

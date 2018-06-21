<?php

Auth::loginUsingId(1);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// all 7 basic restful resource routes
Route::resource('photos', 'PhotoController');

Route::get('/info', 'HomeController@info');

Route::get('/image', function () {
    $img = Image::make('foo.jpg')->resize(1600, 1080);

    return $img->response('jpg');
});

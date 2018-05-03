<?php

//Auth::loginUsingId(1);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// all 7 basic restful resource routes
Route::resource('photos', 'PhotoController');

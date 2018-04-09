<?php

/*
GET   request to  /photos ->             function index() ->     all of the photos, as select * from photos
GET   request to  /photos/create ->      function create() ->    create a photo page.. (display a form)
POST  request to  /photos ->             function store() ->     submit the form, store the photo in the database (post request to the resource)
GET   request to  /photos/{id} ->        function show() ->      view 1 specific photo
GET   request to  /photos/{id}/edit ->   function edit() ->      edit the existing photo
PATCH request to  /photos/{id} ->        function update() ->    when you submit the edit form (its the same address when you want to view a specific photo, different request method)
DELETE request to /photos/{id} ->        function destroy() ->   use the /photos/{id} endpoint to delete the resource.
*/

Auth::loginUsingId(2);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('photos/upload', 'PhotoController@upload');
//Route::post('photos/create', 'PhotoController@create');

Route::get('/photos', 'PhotoController@index');
Route::get('/photos/create', 'PhotoController@create');
Route::post('/photos', 'PhotoController@store');
Route::get('/photos/{photo}', 'PhotoController@show');
Route::get('/photos/{photo}/edit', 'PhotoController@edit');
Route::patch('/photos/{photo}', 'PhotoController@update');
Route::delete('/photos/{photo}', 'PhotoController@destroy');

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Uncomment for SQL query debugging.
// DB::listen(function($query) {
//   return var_dump($query->sql);
// });

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::auth();

Route::group(['middleware' => 'auth'], function(){
  Route::get('/tasks', 'TasksController@index');
  Route::post('/tasks', 'TasksController@create')->middleware('aftertask');
  Route::patch('/tasks/{id}', 'TasksController@update')->middleware('aftertask');
  Route::delete('/tasks/{id}', 'TasksController@delete')->middleware('aftertask');
});

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function(){
  Route::resource('tasks', 'ApiController', ['only' => ['index']]);
});

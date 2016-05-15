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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::auth();

Route::get('/tasks', 'TasksController@index');
Route::post('/tasks', 'TasksController@create');
Route::patch('/tasks', 'TasksController@update');
Route::delete('/tasks', 'TasksController@delete');

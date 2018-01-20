<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Show tasks
Route::get('/', 'TasksController@index');
Route::get('priority', 'TasksController@priority');

//Add tasks
Route::get('create','TasksController@create');
Route::post('create','TasksController@store');

//Edit tasks
Route::get('tasks/{tasks}', 'TasksController@edit');
Route::post('update', 'TasksController@update');

Route::post('tasks_delete', 'TasksController@destroy');
Route::post('tasks_finish', 'TasksController@finish');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

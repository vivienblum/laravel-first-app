<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('projects', 'Api\\ProjectsController');

Route::get('/projects/{project}/tasks', 'Api\\ProjectTasksController@index');
Route::post('/projects/{project}/tasks', 'Api\\ProjectTasksController@store');
Route::get('/projects/{project}/tasks/{task}', 'Api\\ProjectTasksController@show');
Route::patch('/projects/{project}/tasks/{task}', 'Api\\ProjectTasksController@update');
Route::delete('/projects/{project}/tasks/{task}', 'Api\\ProjectTasksController@destroy');

<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group([
    'prefix' => 'api',
    'middleware' => ['web']
], function () {
    Route::resource('religion', 'ReligionController', ['only' => [
        'index', 'show'
    ]]);
    Route::resource('recipient', 'RecipientController', ['only' => [
        'index', 'show'
    ]]);
    Route::resource('goal', 'GoalController', ['only' => [
        'index', 'store', 'show', 'update'
    ]]);
    Route::resource('plea', 'PleaController', ['only' => [
        'index', 'store', 'show'
    ]]);
    Route::resource('stat', 'StatController', ['only' => [
        'index'
    ]]);
});

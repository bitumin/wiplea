<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group([
    'middleware' => ['web']
], function () {
    Route::get('/', 'WebAppController@main');
    Route::get('/check/goal', 'WebAppController@checkGoal');
});

Route::group([
    'prefix' => 'view',
    'middleware' => ['web']
], function () {
    Route::get('/menu', 'WebAppController@menu');
    Route::get('/religions', 'WebAppController@religions');
    Route::get('/recipients/{religion}', 'WebAppController@recipients');
    Route::get('/goals', 'WebAppController@goals');
    Route::get('/plea', 'WebAppController@plea');
    Route::get('/done', 'WebAppController@done');
    Route::get('/stats', 'WebAppController@stats');
    Route::get('/read', 'WebAppController@read');
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => 'api',
    'middleware' => ['web']
], function () {

    /*Random controller*/
    Route::get('random', 'RandomController@randomItems');

    /*Religions*/
    Route::resource('religion', 'ReligionController', ['only' => [
        'index', 'show'
    ]]);

    /*Recipients*/
    Route::resource('recipient', 'RecipientController', ['only' => [
        'index', 'show'
    ]]);

    /*Goals*/
    Route::resource('goal', 'GoalController', ['only' => [
        'index', 'store', 'show', 'update'
    ]]);

    /*Pleas*/
    Route::resource('plea', 'PleaController', ['only' => [
        'index', 'store', 'show'
    ]]);

    /*Stats*/
    Route::resource('stat', 'StatController', ['only' => [
        'index'
    ]]);

    /*Relations*/
    Route::resource('religion.recipient', 'ReligionRecipientsController', ['only' => [
        'index'
    ]]);

});

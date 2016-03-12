<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return view('main'); });
Route::group([
    'prefix' => 'view',
    'middleware' => ['web']
], function () {
    Route::get('/menu', function () { return view('menu'); });
    Route::get('/religions', function () {
        $religions = \App\Religion::all();
        return view('religions', compact('religions'));
    });
    Route::get('/recipients/{religion}', function (\App\Religion $religion) {
        $recipients = $religion->recipients;

        return view('recipients', compact('recipients'));
    });
    Route::get('/goals', function () {
        $goals = \App\Goal::all()->random(20);

        return view('goals', compact('goals'));
    });
    Route::get('/plea', function () { return view('plea'); });
    Route::get('/done', function () { return view('done'); });
    Route::get('/stats', function () { return view('stats'); });
    Route::get('/read', function () { return view('read'); });
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

    /*Religions*/
    Route::resource('religion', 'ReligionController', ['only' => [
        'index', 'show'
    ]]);

    /*Recipients*/
    Route::resource('recipient', 'RecipientController', ['only' => [
        'index', 'show'
    ]]);

    /*Goals*/
    Route::get('goal/random/{n}', 'GoalController@random');
    Route::resource('goal', 'GoalController', ['only' => [
        'index', 'store', 'show', 'update'
    ]]);

    /*Pleas*/
    Route::get('plea/random/{n}', 'PleaController@random');
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

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group([
    'middleware' => ['web']
], function () {
    Route::get('/', function () {
        $religions = \App\Religion::all();
        $goals = \App\Goal::orderByRaw("RAND()")->take(100)->get();

        return view('app', compact('religions', 'goals'));
    });
    Route::get('/view/recipient/religion/{religion}', function (\App\Religion $religion) {
        $recipients = $religion->recipients;

        return view('recipients', compact('recipients'));
    });
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

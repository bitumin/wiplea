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
        $goals = \App\Goal::all();
        if(count($goals)>19)
            $goals = $goals->random(20);

        return view('goals', compact('goals'));
    });
    Route::get('/plea', function () { return view('plea'); });
    Route::get('/done', function () { return view('done'); });
    Route::get('/stats', function () {
        $most_powerful_recipients = DB::select('
            SELECT recipient_id, COUNT(*) as count
            FROM pleas
            WHERE success IS TRUE
            GROUP BY recipient_id, success
            ORDER BY count DESC;
        ');
        $powerful_recipient = [];
        if(count($most_powerful_recipients)>0) {
            $powerful_recipient = \App\Recipient::findOrFail($most_powerful_recipients[0]->recipient_id);
            $powerful_recipient->religion_name = $powerful_recipient->religion->name;
            $powerful_recipient->stat = $most_powerful_recipients[0]->count . ' pleas satisfied!';
        }

        $most_indiferent_recipients = DB::select('
            SELECT recipient_id, COUNT(*) as count
            FROM pleas
            WHERE success IS FALSE
            GROUP BY recipient_id, success
            ORDER BY count DESC;
        ');

        $indiferent_recipient = [];
        if(count($most_indiferent_recipients)>0) {
            $indiferent_recipient = \App\Recipient::findOrFail($most_indiferent_recipients[0]->recipient_id);
            $indiferent_recipient->religion_name = $indiferent_recipient->religion->name;
            $indiferent_recipient->stat = $most_indiferent_recipients[0]->count . ' pleas unheard.';
        }

        return view('stats', compact('powerful_recipient', 'indiferent_recipient'));
    });
    Route::get('/read', function () {
        $plea = \App\Plea::where('is_public', true)->get();
        $recipient = [];
        $religion = [];
        $goal = [];
        if(count($plea)>0) {
            $plea = $plea->random();
            $recipient = $plea->recipient;
            $religion = $recipient->religion;
            $goal = $plea->goal;
        }
        return view('read', compact('plea', 'recipient', 'religion', 'goal'));
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

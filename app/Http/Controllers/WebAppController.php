<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Http\Requests\CheckGoalRequest;
use App\Http\Requests;
use App\Plea;
use App\Recipient;
use App\Religion;
use Carbon\Carbon;

class WebAppController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main()
    {
        return view('main');
    }

    /**
     * @param CheckGoalRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkGoal(CheckGoalRequest $request)
    {
        $goal = Goal::where('id', $request->id)
            ->where('check_email_sent', true)
            ->whereNull('check')
            ->first();
        if(count($goal)>0) {
            $goal->check = $request->check;

            if($goal->save())
                return \Response::json('Goal updated. Thanks for checking your goal!', 200);
        }

        return \Response::json('Unable to check goal.', 500);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menu()
    {
        return view('menu');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function religions()
    {
        $religions = Religion::all();
        return view('religions', compact('religions'));
    }

    /**
     * @param \App\Religion $religion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function recipients(Religion $religion) {
        $recipients = $religion->recipients;

        return view('recipients', compact('recipients'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function goals() {
        $goals = Goal::where('check_at','>',Carbon::tomorrow())->get();
        if(count($goals)>19)
            $goals = $goals->random(20);

        return view('goals', compact('goals'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function plea()
    {
        return view('plea');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function done()
    {
        return view('done');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stats()
    {
        $most_powerful_recipient = \DB::select('
            SELECT recipient_id, COUNT(*) as count
            FROM pleas
            WHERE success IS TRUE
            GROUP BY recipient_id, success
            ORDER BY count DESC
            LIMIT 1;
        ');
        $powerful_recipient = [];
        if(count($most_powerful_recipient)>0) {
            $powerful_recipient = Recipient::findOrFail($most_powerful_recipient[0]->recipient_id);
            $powerful_recipient->religion_name = $powerful_recipient->religion->name;
            $powerful_recipient->stat = $most_powerful_recipient[0]->count . ' pleas satisfied!';
        }

        $most_indifferent_recipient = \DB::select('
            SELECT recipient_id, COUNT(*) as count
            FROM pleas
            WHERE success IS FALSE
            GROUP BY recipient_id, success
            ORDER BY count DESC
            LIMIT 1;
        ');
        $indifferent_recipient = [];
        if(count($most_indifferent_recipient)>0) {
            $indifferent_recipient = Recipient::findOrFail($most_indifferent_recipient[0]->recipient_id);
            $indifferent_recipient->religion_name = $indifferent_recipient->religion->name;
            $indifferent_recipient->stat = $most_indifferent_recipient[0]->count . ' pleas unheard.';
        }
        
        return view('stats', compact('powerful_recipient', 'indifferent_recipient'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function read()
    {
        $plea = Plea::isPublic()->get();
        $recipient = [];
        $religion = [];
        $goal = [];

        if(count($plea)>0) {
            $plea = $plea->random(1);
            $recipient = $plea->recipient;
            $religion = $recipient->religion;
            $goal = $plea->goal;
        }

        return view('read', compact('plea', 'recipient', 'religion', 'goal'));
    }
}

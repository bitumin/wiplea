<?php

namespace App\Http\Controllers;

use App\Goal;

use App\Http\Requests;
use App\Http\Requests\GoalStoreRequest;
use App\Http\Requests\GoalUpdateRequest;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Response::json(Goal::all()->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GoalStoreRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalStoreRequest $request)
    {
        $new_goal = Goal::create($request->only(['text', 'curator_email', 'check_at']));

        if(isset($new_goal->id))
            return \Response::json($new_goal->toArray(), 200);
        return \Response::json('Unable to store new goal', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param Goal $goal
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Goal $goal)
    {
        return \Response::json($goal->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param GoalUpdateRequest|\Illuminate\Http\Request $request
     * @param Goal $goal
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(GoalUpdateRequest $request, Goal $goal)
    {
        if($goal->update($request->only(['check'])))
            return \Response::json('Goal checked', 200);
        return \Response::json('Unable to check goal', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        //
//    }
}

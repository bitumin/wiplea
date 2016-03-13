<?php

namespace App\Http\Controllers;

use App\Http\Requests\PleaRandomRequest;
use App\Http\Requests\PleaStoreRequest;
use App\Plea;
use App\Http\Requests;

class PleaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plea = Plea::isPublic()->get()->toArray();

        return \Response::json($plea);
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
     * @param PleaStoreRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PleaStoreRequest $request)
    {
        $new_plea = Plea::create($request->only(['text', 'is_public', 'goal_id', 'recipient_id']));

        if(isset($new_plea->id))
            return \Response::json('New plea stored', 200);
        return \Response::json('Unable to store new plea', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param Plea $plea
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Plea $plea)
    {
        return \Response::json($plea->toArray());
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//        //
//    }

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

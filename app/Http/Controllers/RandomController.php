<?php

namespace App\Http\Controllers;

use App\Http\Requests\RandomRequest;
use App\Http\Requests;

class RandomController extends Controller
{
    /**
     * Display a random item of the specified resource.
     *
     * @param RandomRequest $request
     * @return \Illuminate\Http\Response
     */
    public function randomItems(RandomRequest $request)
    {
        return \Response::json(\DB::table($request->table)->orderBy(\DB::raw('RAND()'))->take($request->n)->get());
    }
}

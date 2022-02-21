<?php

namespace App\Http\Controllers;

use App\Models\CallInfo;
use Illuminate\Http\Request;

class callInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('component.callInfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $callInfo = CallInfo::create([
            'name_fa' =>$request->name_fa,
            'name_en' =>$request->name_en,
            'position_fa' =>$request->position_fa,
            'position_en' =>$request->position_en,
            'phone_number'=>$request->phone_number,
        ]);
        return redirect()->back();
        // with success message
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CallInfo  $callInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CallInfo $callInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CallInfo  $callInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CallInfo $callInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CallInfo  $callInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CallInfo $callInfo)
    {
        //
    }
}

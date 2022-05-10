<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutus;
use App\Http\Controllers\handyController;
use App\Http\Requests\aboutusCreate;

// a link generated to access storage. to show the image to user
// to show image <img src="{{asset('storage/images/imageColoumnInDB')}}" alt="image">

class aboutusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function show(Aboutus $aboutus)
    {
        //
    }

    public function edit(Aboutus $aboutu)
    {
        return view('component.aboutus.edit')->with('aboutus', $aboutu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */

    public function update(aboutusCreate $request, Aboutus $aboutu)
    {
        $updatableArray = [
            "history_en" => $request->history_en,
            "history_fa" => $request->history_fa,
            "factory_phone"=> $request->factory_phone,
            "office_phone"=> $request->office_phone,
            "office_address_en" => $request->office_address_en,
            "office_address_fa" => $request->office_address_fa,
            "factory_address_en" => $request->factory_address_en,
            "factory_address_fa" => $request->factory_address_fa,
        ];
        $updatableArray = HandyController::updateImage($updatableArray,$aboutu,$request);
        $aboutu->update($updatableArray);
        return redirect()->back()->with('success','با موفقیت ویرایش شد');
    }
}

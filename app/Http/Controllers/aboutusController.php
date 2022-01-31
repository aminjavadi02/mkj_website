<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutus;

class aboutusController extends Controller
{
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $aboutus = Aboutus::find($id);

        if($request->hasfile('image')){
            $request->image->store('images','public');
            $image_name = "about_us_image";
        }
        else{
            $image_name = null;
        }
        $aboutus->update([
            "history_en" => $request->history_en,
            "history_fa" => $request->history_fa,
            "factory_phone"=> $request->factory_phone,
            "office_phone"=> $request->office_phone,
            "office_address_en" => $request->office_address_en,
            "office_address_fa" => $request->office_address_fa,
            "factory_address_en" => $request->factory_address_en,
            "factory_address_fa" => $request->factory_address_fa,
            "google_location_factory" => $request->google_location_factory,
            "google_location_office" => $request->google_location_office,
            "image_name" => $image_name,
        ]);
        
        return response()->json([
            "success"=>true
        ]);
        // works fine
        
    }
}

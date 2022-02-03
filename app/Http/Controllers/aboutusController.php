<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutus;
use Illuminate\Support\Facades\Storage;

// a link generated to access storage. to show the image to user
// to show image <img src="{{asset('storage/images/imageColoumnInDB')}}" alt="image">

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

    public function edit(Aboutus $aboutus)
    {
        return view('component.aboutus.edit')->with('aboutus', $aboutus->get()[0]);
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
            $picture_name = $this->UploadNewImage($request->image,$aboutus);
        }
        // if he wants to delete picture delete it. if not, don't
        else{
            $this->deleteOldImage($aboutus->image_name);
            $picture_name = null;
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
            "image_name" => $picture_name,
        ]);
        
        return redirect()->back();
        // works fine
    }

    protected function UploadNewImage($image,$aboutus)
    {
        if($aboutus->image_name){
            $this->deleteOldImage($aboutus->image_name);
        }
        $image_name = $image->getClientOriginalName();
        $image->storeAs('images',$image_name,'public');
        return $image_name;
    }
    
    protected function deleteOldImage($image)
    {
        Storage::delete('/public/images/'.$image);
    }
}

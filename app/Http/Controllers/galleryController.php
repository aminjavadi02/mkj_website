<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\handyController;

class galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::get()->all();
        // if not empty, show it
        return view('component.gallery.index')->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->image) then save image
        if($request->hasfile('image')){
            $image_name = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$image_name,'public');
        }
        else{
            $image_name=null;
        }
        $photo = Gallery::create([
            'name'=>$image_name,
            'description_fa'=>$request->description_fa,
            'description_en'=>$request->description_en,
        ]);
    
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery->name){
            handyController::deleteOldImage($gallery->name);
        }
        $gallery->delete();
        return redirect()->back();
    }

}

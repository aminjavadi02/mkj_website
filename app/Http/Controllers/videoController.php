<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\videoToGallery;
use Illuminate\Support\Facades\Storage;

class videoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(videoToGallery $request)
    {
        $video_name = handyController::imageNameGenerator('gallery',$request->video->getClientOriginalExtension());
        if(!$video_name){
            return redirect()->back()->with('error','خطا در نام گذاری ویدیو');
        }
        else{
            $request->video->storeAs('videos/gallery',$video_name,'public');
            Gallery::create([
                'image_name'=>$video_name,
                'is_image'=>false,
            ]);
            return redirect()->back()->with('success','با موفقیت اضافه شد');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $video)
    {
        Storage::delete('/public/videos/gallery/'.$video->image_name);
        $video->delete();
        return redirect()->back()->with('success','با موفقیت حذف شد');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\handyController;
use App\Http\Requests\galleryCreate;

class galleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
    public function store(galleryCreate $request)
    {
        $image_name = handyController::imageNameGenerator('gallery',$request->image->getClientOriginalExtension());
        if(!$image_name){
            return redirect()->back()->with('error','خطا در نام گذاری عکس');
        }
        else{
            $request->image->storeAs('images/gallery',$image_name,'public');
            Gallery::create([
                'image_name'=>$image_name,
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
    public function destroy(Gallery $gallery)
    {
        if($gallery->image_name){
            handyController::deleteOldImage($gallery->image_name,$gallery->getTable());
        }
        $gallery->delete();
        return redirect()->back()->with('success','با موفقیت حذف شد');
    }

}

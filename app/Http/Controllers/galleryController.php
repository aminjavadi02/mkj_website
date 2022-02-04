<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function create()
    {
        return view('component.gallery.create');
    }

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
            'description'=>$request->description,
        ]);
    
        return redirect()->back();
    }

    public function edit(Gallery $gallery)
    {
        return view('component.gallery.edit')->with('image', $gallery);
    }

    public function update(Request $request, Gallery $gallery)
    {
        if($request->hasfile('image')){
            $picture_name = $this->UploadNewImage($request->image,$gallery);
        }
        else{
            $this->deleteOldImage($gallery->name);
            $picture_name=null;
        }
        $gallery->update([
            'name'=>$picture_name,
            'description'=>$request->description,
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
            Storage::delete('/public/images/'.$gallery->name);
        }
        $gallery->delete();
        return redirect()->back();
    }



    protected function UploadNewImage($image,$gallery)
    {
        if($gallery->name){
            $this->deleteOldImage($gallery->name);
        }
        $name = $image->getClientOriginalName();
        $image->storeAs('images',$name,'public');
        return $name;
    }
    
    protected function deleteOldImage($image)
    {
        Storage::delete('/public/images/'.$image);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::get()->all();
        return view('component.blog.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('component.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('image')){
            $image_name = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$image_name,'public');
        }
        else{
            $image_name=null;
        }
        $blog = Blog::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'text'=>$request->text,
            'image_name'=>$image_name
        ]);
        return redirect()->back();
        // with success message
        // works fine
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('component.blog.edit')->with('blog',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if($request->hasfile('image')){
            $picture_name = $this->UploadNewImage($request->image,$blog);
        }
        else{
            $this->deleteOldImage($blog->image_name);
            $picture_name=null;
        }
        $blog->update([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'text'=>$request->text,
            'image_name'=>$picture_name
        ]);
       return redirect()->back();
        // works fine
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if($blog->image_name){
            Storage::delete('/public/images/'.$blog->image_name);
        }
        $blog->delete();
        return redirect()->back();
    }


    protected function UploadNewImage($image,$blog)
    {
        if($blog->image_name){
            $this->deleteOldImage($blog->image_name);
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

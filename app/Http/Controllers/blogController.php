<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\handyController;
use App\Http\Requests\blogCreate;

class blogController extends Controller
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
    public function store(blogCreate $request)
    {
        if($request->hasfile('image')){
            $image_name = handyController::imageNameGenerator('blog',$request->image->getClientOriginalExtension());
            if($image_name){
                $request->image->storeAs('images/blog',$image_name,'public');
            }
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
        return redirect()->route('blogs.index')->with('success','با موفقیت اضافه شد');;
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
    public function update(blogCreate $request, Blog $blog)
    {
        $updatableArray = [
            'title'=>$request->title,
            'slug'=>$request->slug,
            'text'=>$request->text,
        ];
        $updatableArray = HandyController::updateImage($updatableArray,$blog,$request);
        $blog->update($updatableArray);
        return redirect()->route('blogs.index')->with('success','با موفقیت ویرایش شد');
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
            handyController::deleteOldImage($blog->image_name,$blog->getTable());
        }
        $blog->delete();
        return redirect()->route('blogs.index')->with('success','با موفقیت حذف شد');;
    }
}

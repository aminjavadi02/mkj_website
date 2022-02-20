<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;

class managerController extends Controller
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
        return view('component.manager.create');
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
        }else{
            $image_name = null;
        }
        $manager = Manager::create([
            'name_fa'=>$request->name_fa,
            'name_en'=>$request->name_en,
            'position_fa'=>$request->position_fa,
            'position_en'=>$request->position_en,
            'about_fa'=>$request->about_fa,
            'about_en'=>$request->about_en,
            'image_name'=>$image_name
        ]);
        return redirect()->back();
        // index with success message
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $manager->update([
            'name_fa'=>$request->name_fa,
            'name_en'=>$request->name_en,
            'position_fa'=>$request->position_fa,
            'position_en'=>$request->position_en,
            'about_fa'=>$request->about_fa,
            'about_en'=>$request->about_en,
            // 'image_name'=>$request->image->getClientOriginalName() or sth
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();
    }
}

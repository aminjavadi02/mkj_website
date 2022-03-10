<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\handyController;
use App\Http\Requests\managersCreate;

class managerController extends Controller
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
        $managers = Manager::select('id','name_fa','name_en','position_fa','position_en')->get()->all();
        return view('component.manager.index')->with('managers',$managers);
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
    public function store(managersCreate $request)
    {
        if($request->hasfile('image')){
            $image_name = handyController::imageNameGenerator('managers',$request->image->getClientOriginalExtension());
            if($image_name){
                $request->image->storeAs('images/managers',$image_name,'public');
            }
        }else{
            $image_name = null;
        }
        $validated = $request->safe();

        $manager = Manager::create([
            'name_fa'=>$validated->name_fa,
            'name_en'=>$validated->name_en,
            'position_fa'=>$validated->position_fa,
            'position_en'=>$validated->position_en,
            'about_fa'=>$validated->about_fa,
            'about_en'=>$validated->about_en,
            'image_name'=>$image_name
        ]);
        return redirect()->route('managers.index')->with('success','با موفقیت اضافه شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        return view('component.manager.edit')->with('manager',$manager);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(managersCreate $request, Manager $manager)
    {
        $updatableArray = [
            'name_fa'=>$request->name_fa,
            'name_en'=>$request->name_en,
            'position_fa'=>$request->position_fa,
            'position_en'=>$request->position_en,
            'about_fa'=>$request->about_fa,
            'about_en'=>$request->about_en,
        ];
        $updatableArray = HandyController::updateImage($updatableArray,$manager,$request);
        $manager->update($updatableArray);
        return redirect()->route('managers.index')->with('success','با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        if($manager->image_name){
            handyController::deleteOldImage($manager->image_name,$manager->getTable());
        }
        $manager->delete();
        return redirect()->route('managers.index')->with('success','با موفقیت حذف شد');
    }

    
}

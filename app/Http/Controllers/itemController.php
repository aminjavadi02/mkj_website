<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Packages;
use App\Models\Category;
use Illuminate\Http\Request;

class itemController extends Controller
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
    public function create($category_id = null)
    {
        $packages = Packages::get()->all();
        if($category_id){
            $category = Category::find($category_id); //if null returns null
        }
        else{
            $category = Category::tree()->all();
        }

        return view('component.item.create',compact('packages','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Item::create([
            'name_fa'=>$request->name_fa,
            'name_en'=>$request->name_en,
            'description_fa'=>$request->description_fa,
            'description_en'=>$request->description_en,
            'size'=>$request->size,
            'alloy' =>$request->alloy,
            'category_id'=>$request->category_id,
        ]);

        // attach item and packages to itempackage table
        $packages = explode(',', $request->package_id);
        foreach($packages as $package){
            $item->packages()->attach($package);
        }
        return redirect()->back();
        // redirect to index with success message
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        // return item + itemimage to front
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $checkedArray = [];
        $checked = $item->packages()->select('packages_id')->get()->all();
        $packages = Packages::get()->all();
        $category = Category::tree()->all();
        foreach ($checked as $check){
            array_push( $checkedArray ,$check->packages_id);
        }

        return view('component.item.edit',compact('checkedArray','packages','item','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {   
        $records = $item->packages()->get()->all();
        $packages = explode(',', $request->package_id);
        if(empty($records)){
            foreach($packages as $package){
                $item->packages()->attach($package);
            }
        }
        else{
            foreach($records as $record){
                $item->packages()->detach($record);
            }
            foreach($packages as $package){
                $item->packages()->attach($package);
            }
        }
        $item->update([
            'name_fa'=>$request->name_fa,
            'name_en'=>$request->name_en,
            'description_fa'=>$request->description_fa,
            'description_en'=>$request->description_en,
            'size'=>$request->size,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->back();
        // to index with success message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
    }
}

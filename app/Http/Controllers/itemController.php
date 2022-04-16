<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Packages;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\itemCreate;

class itemController extends Controller
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
        $items = Item::get()->all();
        foreach ($items as $item){
            $item->category_name_fa = Category::find($item->category_id)->name_fa;
        }
        return view('component.item.index')->with('items', $items);
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
    public function store(itemCreate $request)
    {
        $packages = $request->packages;
        $item = Item::create([
            'name_fa'=>$request->name_fa,
            'name_en'=>$request->name_en,
            'description_fa'=>$request->description_fa,
            'description_en'=>$request->description_en,
            'size'=>$request->size,
            'alloy_fa' =>$request->alloy_fa,
            'alloy_en' =>$request->alloy_en,
            'category_id'=>$request->category_id,
        ]);

        // attach item and packages to itempackage table
        foreach($packages as $package){
            $item->packages()->attach($package);
        }
        return redirect()->route('items.index')->with('success','با موفقیت اضافه شد');
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
    public function update(itemCreate $request, Item $item)
    {   
        $packages = $request->packages;
        $records = $item->packages()->get()->all();
        if(!$packages){
            foreach($records as $record){
                $item->packages()->detach($record);
            }
        }
        else{
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
        }
        $item->update([
            'name_fa'=>$request->name_fa,
            'name_en'=>$request->name_en,
            'description_fa'=>$request->description_fa,
            'description_en'=>$request->description_en,
            'size'=>$request->size,
            'alloy_fa' =>$request->alloy_fa,
            'alloy_en' =>$request->alloy_en,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->route('items.index')->with('success','با موفقیت ویرایش شد');
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
        return redirect()->route('items.index')->with('success','با موفقیت حذف شد');
    }
}

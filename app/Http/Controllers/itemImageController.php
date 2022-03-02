<?php

namespace App\Http\Controllers;

use App\Models\itemImage;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Controllers\handyController;
use App\Http\Requests\itemImageCreate;

class itemImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(Item $itemimage)
    {
        $item_id = $itemimage->id;
        $images = itemImage::where('item_id', $item_id)->get()->all();
        if($itemimage){
            return view('component.itemimage.show',compact('item_id','images'));
        }
        else{
            return redirect()->route('items.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(itemImageCreate $request)
    {
        $image_name = handyController::imageNameGenerator('item_images',$request->image->getClientOriginalExtension());
        if(!$image_name){
            return redirect()->back()->with('error','خطا در نام گذاری عکس');
        }
        else {
            $request->image->storeAs('images/item_images',$image_name,'public');
            $photo = itemImage::create([
                'image_name'=>$image_name,
                'item_id'=>$request->item_id,
            ]);
            return redirect()->back()->with('success','با موفقیت اضافه شد');   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\itemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemImage $itemimage)
    {
        if($itemimage->image_name){
            handyController::deleteOldImage($itemimage->image_name,$itemimage->getTable());
        }
        $itemimage->delete();
        return redirect()->back()->with('success','با موفقیت حذف شد');
    }

    
}

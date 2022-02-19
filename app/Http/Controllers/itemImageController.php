<?php

namespace App\Http\Controllers;

use App\Models\itemImage;
use Illuminate\Http\Request;
use App\Models\Item;

class itemImageController extends Controller
{
    // show images

    // routes: create, store, destroy, show

    /**
     * show
     */
    public function show($item_id)
    {
        $item = Item::find($item_id);
        $images = itemImage::where('item_id', $item_id)->get()->all();
        if($item){
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
    public function store(Request $request)
    {
        if($request->hasfile('image')){
            $image_name = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$image_name,'public');
        }else{
            return redirect()->back();
            // with error message
        }
        $photo = itemImage::create([
            'image_name'=>$image_name,
            'item_id'=>$request->item_id,
        ]);
    
        return redirect()->back();
        // with success message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\itemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($image_id)
    {
        $image = ItemImage::find($image_id);
        $image->delete();
        return redirect()->back();
    }
}

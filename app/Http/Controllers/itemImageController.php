<?php

namespace App\Http\Controllers;

use App\Models\itemImage;
use Illuminate\Http\Request;

class itemImageController extends Controller
{
    // we dont show all images so no index function

    // routes: create, store, destroy

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // form is in item create. not needed here
    public function create()
    {
        /**
         * form:
         * images [] multiple
         * item_id
         */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = $request->images;
        foreach($images as $image){
            // save image
            itemImage::create([
                'item_id'=>$request->item_id,
                'image_name'=>$image->getClientOriginalName(),
            ]);
            $image->store('images','public');
        }
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\itemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(itemImage $itemImage)
    {
        $itemImage->delete();
    }
}

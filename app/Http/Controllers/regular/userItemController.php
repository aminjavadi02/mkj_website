<?php

namespace App\Http\Controllers\regular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class userItemController extends Controller
{
    public function latestItems($lang='fa')
    {
        if($lang=='en'){
            // dd('add en');
        }
        else {
            $latest_items = Item::
                latest()
                ->take(8)
                ->with(['images','category'])
                ->select(
                    'id',
                    // foreign key is needed to retrieve data from relation
                    'category_id',
                    // foreign key is needed to retrieve data from relation
                    'updated_at',
                    'name_fa',
                    'alloy',
                    'size',
                )
                ->get()
                ->toArray();
                // toArray() puts relations next to retrieved data
            // do the same for allItems
            if(count($latest_items)>0){
                return view('guest.fa.component.item.latest')->with('items',$latest_items);
            }
            else {
                return redirect('/')->with('error','محصولی در سایت موجود نیست');
            }
        }
    }
    public function allItems($lang='fa')
    {
        if($lang=='en'){
            // dd('add en');
        }
        else {
            $items = Item::
                latest()
                ->with(['images','category'])
                ->select(
                    'id',
                    // foreign key is needed to retrieve data from relation
                    'category_id',
                    // foreign key is needed to retrieve data from relation
                    'updated_at',
                    'name_fa',
                    'alloy',
                    'size',
                )
                ->get()
                ->toArray();
            if(count($items)>0){
                return view('guest.fa.component.item.all')->with('items',$items);
            }
            else {
                return redirect('/')->with('error','محصولی در سایت موجود نیست');
            }
        }
    }
    public function oneItem($lang='fa',Item $item)
    {
        if($lang=='en'){
            // dd('add en');
        }
        else{
            $tree = Category::fathers($item->category_id);
            $imageObjects = $item->images()->get();
            if(count($imageObjects) > 0){
                foreach ($imageObjects as $key => $image){
                    $images[$key] = $image->image_name;
                }
            }
            else{
                $images=[];
            }
            $packagesList = $item->packages()->get();
            if(count($packagesList) > 0){
                foreach ($packagesList as $key => $package){
                    $packages[$key] = $package->name_fa;
                }
            }
            else{
                $packages=[];
            }
            $data = [
                'id' =>$item->id,
                'name'=>$item->name_fa,
                'description'=>$item->description_fa,
                'alloy' =>$item->alloy,
                'size'=>$item->size,
                'categoryList'=>$tree,
                'imagesList'=>$images,
                'time'=>$item->updated_at,
                'packagesList'=>$packages,
            ];
            return view('guest.fa.component.item.one')->with('item',$data);
        }
    }
}

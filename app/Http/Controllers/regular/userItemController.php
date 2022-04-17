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
        if($lang=='en' || $lang=='fa'){
            $latest_items = Item::
                latest()
                ->take(8)
                ->with(['images','category'])
                ->select(
                    'id',
                    'category_id',
                    'updated_at',
                    'name_'.$lang,
                    'alloy_'.$lang,
                    'size',
                )
                ->get()
                ->toArray();
                if(count($latest_items)>0){
                    return view('guest.'.$lang.'.component.item.latest')->with('items',$latest_items);
                }
                else {
                    return redirect()->back()->with('error','error');
                }
        }else {
            return redirect()->back()->with('error','error');
        }
    }
    public function allItems($lang='fa')
    {
        if($lang=='en' || $lang=='fa'){
            $items = Item::
                latest()
                ->with(['images','category'])
                ->select(
                    'id',
                    'category_id',
                    'updated_at',
                    'name_'.$lang,
                    'alloy_'.$lang,
                    'size',
                )
                ->get()
                ->toArray();
                if(count($items)>0){
                    return view('guest.'.$lang.'.component.item.all')->with('items',$items);
                }
                else {
                    return redirect()->back()->with('error','error');
                }
        }else{
            return redirect()->back()->with('error','error');
        }
    }
    public function oneItem($lang='fa',Item $item)
    {
        if($lang=='en' || $lang=='fa'){
            $tree = Category::fathers($item->category_id,$lang);
            $imageObjects = $item->images()->get();
            if(count($imageObjects) > 0){
                foreach ($imageObjects as $key => $image){
                    $images[$key] = $image->image_name;
                }
            }else{
                $images=[];
            }
            $packagesList = $item->packages()->get();
            if(count($packagesList) > 0){
                foreach ($packagesList as $key => $package){
                    $packages[$key] = $package['name_'.$lang];
                }
            }else{
                $packages=[];
            }
            $data = [
                'id' =>$item->id,
                'name'=>$item['name_'.$lang],
                'description'=>$item['description_'.$lang],
                'alloy' =>$item['alloy_'.$lang],
                'size'=>$item->size,
                'categoryList'=>$tree,
                'imagesList'=>$images,
                'time'=>$item->updated_at,
                'packagesList'=>$packages,
            ];
            return view('guest.'.$lang.'.component.item.one')->with('item',$data);
        }else {
            return redirect()->back()->with('error','error');
        }
    }
}

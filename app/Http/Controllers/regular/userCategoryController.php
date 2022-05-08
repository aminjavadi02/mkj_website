<?php

namespace App\Http\Controllers\regular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class userCategoryController extends Controller
{
    public function categories($lang='fa')
    {
        if($lang == 'en' || $lang == 'fa'){
            $categories = Category::tree();
            return view('guest.'.$lang.'.component.category.catIndex')->with('categories',$categories);
        }else{
            abort(404);
        }
    }

    public function getCatItems($lang='fa',Category $cat)
    {
        $items = [];
        $children = Category::allChildren($cat);
        // if sub-cats of this cat have any item
        if(count($children)>0){
            foreach($children as $key => $child){
                if(count($child->items()->get())>0){
                    $items[$key] = $child->items()->get();
                }
            }
        }
        if(count($items)>0){
            if($lang == 'en' || $lang == 'fa'){
                $pagename = $cat['name_'.$lang];
                return view('guest.'.$lang.'.component.category.catItems',compact('items','pagename'));
            }
            else{
             abort(404);
            }
        }
        else{
            return redirect()->back()->with('error','error');
        }
    }
}

<?php

namespace App\Http\Controllers\regular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class userCategoryController extends Controller
{
    public function categories($lang='fa')
    {
        if($lang == 'en'){
            // add en
        }else{
            $categories = Category::tree();
            return view('guest.fa.component.category.catIndex')->with('categories',$categories);
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
            if($lang == 'en'){
                // dd('add en');
            }
            else{
                $pagename = $cat->name_fa;
                return view('guest.fa.component.category.catItems',compact('items','pagename'));
            }
        }
        else{
            return redirect()->back()->with('error','محصولی با این دسته بندی موجود نیست');
        }
    }
}

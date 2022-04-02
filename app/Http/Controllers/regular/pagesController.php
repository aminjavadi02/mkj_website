<?php

namespace App\Http\Controllers\regular;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Aboutus;
use App\Models\Item;
use App\Models\Manager;
use App\Models\Contactus;
use App\Models\Blog;
use App\Models\Category;
use App\Http\Requests\newMsgCreate;
use Carbon\Carbon;

class pagesController extends Controller
{
    public function index($lang='fa')
    {
        if($lang=='en'){
            // add en
        }
        else{
            $galleryImages = Gallery::get()->all();
            $aboutus = Aboutus::select('history_fa','office_phone','office_address_fa','factory_address_fa','factory_phone')->get()->first();
            $items = Item::with('images')->latest()->take(4)->with(['images','category'])
            ->select(
                'id',
                // foreign key is needed to retrieve data from relation
                'category_id',
                // foreign key is needed to retrieve data from relation
                'updated_at',
                'name_fa',
                'alloy',
                'size',
            )->get()->all();
            return view('guest.fa.component.index.indexpage',compact('galleryImages','aboutus','items'));
        }
    }

    public function newMsg(newMsgCreate $request)
    {
        Contactus::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'text'=>$request->text,
        ]);
        return redirect()->back()->with('success','با موفقیت ارسال شد');;
    }

    public function showAboutus($lang='fa')
    {
        if($lang=='en'){
            // dd('add english');
        }
        else{
            $aboutus = Aboutus::select('history_fa','office_phone','factory_phone','office_address_fa','factory_address_fa','image_name')->get()->first();
            return view('guest.fa.component.aboutus.show')->with('aboutus',$aboutus);
        }
    }

    public function showManagers($lang='fa')
    {
        if($lang=='en'){
            // dd('add en');
        }
        else{
            $managers = Manager::select('id','name_fa','position_fa','image_name')->get()->all();
            return view('guest.fa.component.managers.index')->with('managers',$managers);
        }
    }

    public function showAManager($id,$lang='fa')
    {
        if($lang=='en'){
            // dd('add en');
        }
        else {
            $manager = Manager::where('id',$id)->select('name_fa','position_fa','about_fa','image_name')->get()->all();
            return view('guest.fa.component.managers.show')->with('manager',$manager);
        }
    }

    public function latestBlogs($lang='fa')
    {
        $latestBlogs = Blog::take(5)->latest()->get();
        if(count($latestBlogs)>0){
            if($lang=='en'){
                // dd('add en');    
            }
            else{
                foreach($latestBlogs as $key => $latestBlog){
                    $blogs[$key]  = [
                        'id' => $latestBlog->id,
                        'title' => $latestBlog->title,
                        'abstract' => pagesController::makeAbstract($latestBlog->text),
                        'time' => $latestBlog->updated_at->format('Y-M'),
                    ];
                }
                return view('guest.fa.component.blogs.latest')->with('blogs',$blogs);
            }
        }
        else{
            return redirect('/')->with('error','بلاگی در سایت موجود نمی باشد');
        }
    }
    public function allBlogs($lang='fa')
    {
        $latestBlogs = Blog::latest()->get();
        if(count($latestBlogs)>0){
            if($lang=='en'){
                // dd('add en');
            }
            else{
                foreach($latestBlogs as $key => $latestBlog){
                    $blogs[$key]  = [
                        'id' => $latestBlog->id,
                        'title' => $latestBlog->title,
                        'time' => $latestBlog->updated_at->format('Y-M'),
                    ];
                }
                return view('guest.fa.component.blogs.all')->with('blogs',$blogs);
            }
        }
        else{
            return redirect('/')->with('error','بلاگی در سایت موجود نمی باشد');
        }
    }
    public function showblog(Blog $id)
    {
        return view('guest.fa.component.blogs.one')->with('blog',$id);
    }

    // gallery
    public function gallery($lang='fa')
    {
        if($lang=='en'){
            // add en
        }else{
            $gallery = Gallery::get()->all();
            if(count($gallery) > 0){
                return view('guest.fa.component.gallery.gallerypage')->with('gallery',$gallery);
            }
            else{
                return redirect('/')->with('error','تصویری در گالری موجود نمی باشد');
            }
        }
    }

    // items
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

    // category
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
    
    // handy
    public static function makeAbstract($text)
    {
        // cut tags
        $text = strip_tags($text);
        // cut special chars
        $text = preg_replace('/&#?[a-z0-9]+;/i',"",$text);
        // cut \n\r stuff
        $text = str_replace("\r\n","",$text);

        if(Str::length($text) > 500){
            // short it           
            $text = Str::limit($text,500,'...');
            return $text;
        }
        else{
            return $text;
        }
    }
}
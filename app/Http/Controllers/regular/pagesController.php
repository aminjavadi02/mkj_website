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
use App\Http\Requests\newMsgCreate;
use Carbon\Carbon;

class pagesController extends Controller
{
    public function index()
    {
        $galleryImages = Gallery::get()->all();
        $aboutus = Aboutus::select('history_fa','office_phone','office_address_fa','factory_address_fa','factory_phone')->get()->first();
        $itemImages = Item::getAllImagesObject();
        return view('guest.fa.component.index.indexpage',compact('galleryImages','aboutus','itemImages'));
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
        if($lang=='en'){
            // dd('add en');    
        }
        else{
            $latestBlogs = Blog::take(5)->latest()->get();
            foreach($latestBlogs as $key => $latestBlog){
                $blogs[$key]  = [
                    'title' => $latestBlog->title,
                    'abstract' => pagesController::makeAbstract($latestBlog->text),
                    'time' => $latestBlog->updated_at->format('Y-M'),
                ];
            }
            return view('guest.fa.component.blogs.latest')->with('blogs',$blogs);
        }
    }
    public function allBlogs($lang='fa')
    {
        if($lang=='en'){
            // dd('add en');
        }
        else{
            $latestBlogs = Blog::get()->all();
            foreach($latestBlogs as $key => $latestBlog){
                $blogs[$key]  = [
                    'title' => $latestBlog->title,
                    'time' => $latestBlog->updated_at->format('Y-M'),
                ];
            }
            return view('guest.fa.component.blogs.all')->with('blogs',$blogs);
        }
    }










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

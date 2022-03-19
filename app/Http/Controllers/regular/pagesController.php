<?php

namespace App\Http\Controllers\regular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Aboutus;
use App\Models\Item;
use App\Models\Manager;
use App\Models\Contactus;
use App\Models\Blog;
use App\Http\Requests\newMsgCreate;

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
        if($lang=='fa'){
            $aboutus = Aboutus::select('history_fa','office_phone','factory_phone','office_address_fa','factory_address_fa','image_name')->get()->first();
            return view('guest.fa.component.aboutus.show')->with('aboutus',$aboutus);
            // 'history_fa','office_phone','factory_phone','office_address_fa','factory_address_fa','image_name'
        }
        elseif($lang=='en'){
            // dd('add english');
        }
        else{
            $aboutus = Aboutus::select('history_fa','office_phone','factory_phone','office_address_fa','factory_address_fa','image_name')->get()->first();
            return view('guest.fa.component.aboutus.show')->with('aboutus',$aboutus);
        }
    }

    public function showManagers($lang='fa')
    {
        if($lang=='fa'){
            $managers = Manager::select('id','name_fa','position_fa','image_name')->get()->all();
            return view('guest.fa.component.managers.index')->with('managers',$managers);
        }
        elseif($lang=='en'){
            dd('kir');
        }
        else{
            // same as fa
        }
    }

    public function showAManager($id,$lang='fa')
    {
        if($lang=='fa'){
            $manager = Manager::where('id',$id)->select('name_fa','position_fa','about_fa','image_name')->get()->all();
            return view('guest.fa.component.managers.show')->with('manager',$manager);
        }
        elseif($lang=='en'){
            dd('add en');
        }
        else {
            $manager = Manager::where('id',$id)->select('name_fa','position_fa','about_fa','image_name')->get()->all();
            return view('guest.fa.component.managers.show')->with('manager',$manager);
        }
    }

    public function latestBlogs($lang='fa')
    {
        
        dd(Blog::take(5)->latest()->get());
    }
}

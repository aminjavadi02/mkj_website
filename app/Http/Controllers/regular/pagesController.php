<?php

namespace App\Http\Controllers\regular;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Aboutus;
use App\Models\Item;
use App\Models\Contactus;
use App\Http\Requests\newMsgCreate;

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
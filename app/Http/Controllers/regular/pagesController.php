<?php

namespace App\Http\Controllers\regular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Aboutus;
use App\Models\Item;
use App\Models\Contactus;

class pagesController extends Controller
{
    public function index()
    {
        $galleryImages = Gallery::get()->all();
        $aboutus = Aboutus::select('history_fa','image_name')->get()->first();
        $itemImages = Item::getAllImagesObject();
        return view('guest.fa.component.index.indexpage',compact('galleryImages','aboutus','itemImages'));
    }

    public function newMsg(Request $request)
    {
        Contactus::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'text'=>$request->text,
        ]);
        return redirect()->back();
        // with success message
    }

    // delete msg
}

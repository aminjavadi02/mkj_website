<?php

namespace App\Http\Controllers\regular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Aboutus;
use App\Models\Item;

class pagesController extends Controller
{
    public function index()
    {
        // gallery images
        $images = Gallery::get()->all();
        // about us -> image + desc fa
        $aboutus = Aboutus::select('history_fa','image_name')->get()->all();
        // items -> name + images
        $itemsAndImages = Item::getAllImagesObject();
        if(count($itemsAndImages)>5){

        }
        // dd($itemsAndImages[0]['images'][0]['name']); -> to get the name
        return view('guest.fa.component.indexpage');
    }
}

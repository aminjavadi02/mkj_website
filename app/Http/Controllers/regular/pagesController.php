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
        // items -> lazy : max 5 items
        $items = Item::get()->all();
        
        $test = Item::getAllImagesObject();
        dd($test);
        // dd($items[2]->images()->get()->all()[0]['image_name']);
        return view('guest.fa.component.indexpage');
    }
}

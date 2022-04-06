<?php

namespace App\Http\Controllers\regular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;

class userManagerController extends Controller
{
    public function indexManagers($lang='fa')
    {
        if($lang=='en'){
            // dd('add en');
        }
        else{
            $managers = Manager::select('id','name_fa','position_fa','image_name')->get()->all();
            return view('guest.fa.component.managers.index')->with('managers',$managers);
        }
    }

    public function showManager($id,$lang='fa')
    {
        if($lang=='en'){
            // dd('add en');
        }
        else {
            $manager = Manager::where('id',$id)->select('name_fa','position_fa','about_fa','image_name')->get()->all();
            return view('guest.fa.component.managers.show')->with('manager',$manager);
        }
    }
}

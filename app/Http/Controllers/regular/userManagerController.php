<?php

namespace App\Http\Controllers\regular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;

class userManagerController extends Controller
{
    public function indexManagers($lang='fa')
    {
        if($lang=='en' || $lang=='fa'){
            $managers = Manager::select('id','name_'.$lang,'position_'.$lang,'image_name')->get()->all();
            if(count($managers)>0){
                return view('guest.'.$lang.'.component.managers.index')->with('managers',$managers);
            }else {
                return redirect()->back()->with('error','error');
            }
            
        }else{
            abort(404);
        }
    }

    public function showManager($id,$lang='fa')
    {
        if($lang=='en' || $lang=='fa'){
            $manager = Manager::where('id',$id)->select('name_'.$lang,'position_'.$lang,'about_'.$lang,'image_name')->get()->all();
            return view('guest.'.$lang.'.component.managers.show')->with('manager',$manager);
        }else{
            abort(404);
        }
    }
}

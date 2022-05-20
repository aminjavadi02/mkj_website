<?php

namespace App\Http\Controllers\regular;

use App\Http\Controllers\Controller;
use App\Models\CallInfo;
use Illuminate\Http\Request;

class userCallInfo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang='fa')
    {
        if($lang=='fa' || $lang=='en'){
            $callinfo = CallInfo::select(
                'name_'.$lang,
                'position_'.$lang,
                'phone_number'
            )->get()->all();
            if(count($callinfo)>0){
                return view('guest.'.$lang.'.component.callInfo.index')->with('callinfos',$callinfo);
            }else {
                return redirect()->back()->with('error','error');
            }
        }else {
            abort(404);
        }
    }
}

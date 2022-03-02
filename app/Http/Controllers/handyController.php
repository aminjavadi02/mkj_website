<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class handyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public static function UploadNewImage($image,$model)
    {
        if($model->image_name){
            handyController::deleteOldImage($model->image_name);
        }
        $image_name = handyController::imageNameGenerator($model->getTable(),$image->getClientOriginalExtension()); // here
        $image->storeAs('images',$image_name,'public');
        return $image_name;
    }
    
    public static function deleteOldImage($image)
    {
        Storage::delete('/public/images/'.$image);
    }

    
    // generates an unique name for image
    public static function imageNameGenerator($table,$fileFormat,$counter=0){
        $image_name_array = ["image_name" => Str::random(32).'.'.$fileFormat];
        $validator = Validator::make($image_name_array,[
            'image_name'=>'unique:'.$table.',image_name'
            // 'image_name'=>'file'
        ]);
        if($validator->fails()) {
            $counter +=1 ;
            if($counter>10){
                return;
            }
            else{
                handyController::imageNameGenerator($table,$counter);
            }
        }
        else{
            return $image_name_array['image_name'];
        }
    }
}



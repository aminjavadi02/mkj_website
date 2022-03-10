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
            handyController::deleteOldImage($model->image_name,$model->getTable());
        }
        $image_name = handyController::imageNameGenerator($model->getTable(),$image->getClientOriginalExtension()); // here
        $image->storeAs('images/'.$model->getTable(),$image_name,'public');
        return $image_name;
    }
    
    public static function deleteOldImage($image,$tableName)
    {
        Storage::delete('/public/images/'.$tableName.'/'.$image);
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

    public static function updateImage($updatableArray,$model,$request)
    {
        if($request->imageIsDeleted == "true"){
            if($request->hasfile('image')){
                $picture_name = handyController::UploadNewImage($request->image,$model);
                $updatableArray["image_name"] = $picture_name;
            }
            else{
                handyController::deleteOldImage($model->image_name,$model->getTable());
                $updatableArray["image_name"] = null;
            }
        }
        else{
            if($request->hasfile('image')){
                $picture_name = handyController::UploadNewImage($request->image,$model);
                $updatableArray["image_name"] = $picture_name;
            }
        }

        return $updatableArray;
    }
}



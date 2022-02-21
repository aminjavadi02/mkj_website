<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class handyController extends Controller
{
    public static function UploadNewImage($image,$model)
    {
        if($model->image_name){
            $this->deleteOldImage($model->image_name);
        }
        $image_name = $image->getClientOriginalName();
        $image->storeAs('images',$image_name,'public');
        return $image_name;
    }
    
    public static function deleteOldImage($image)
    {
        Storage::delete('/public/images/'.$image);
    }
}

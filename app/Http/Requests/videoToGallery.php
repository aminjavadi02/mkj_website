<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class videoToGallery extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'video' =>'required|mimes:mp4|max:20000|file'
        ];
    }

    public function messages()
    {
        return [
            'video.required' => 'یک ویدیو انتخاب کنید',
            'video.mimes'=>'فقط فرمت mp4 برای ویدیو قابل قبول است',
            'video.max'=>'حجم ویدیو باید حداکثر ۲۰ مگابایت باشد',
            
        ];
    }
}

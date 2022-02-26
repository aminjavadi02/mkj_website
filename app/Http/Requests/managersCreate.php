<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class managersCreate extends FormRequest
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
            'name_fa'=> 'required',
            'name_en'=> 'required',
            'position_fa'=> 'required',
            'position_en'=> 'required',
            'about_fa'=> 'required',
            'about_en'=> 'required',
            'image'=> 'mimes:jpg,png|file|max:6000',
        ];
    }

    public function messages()
    {
        return [
            'name_fa.required'=>'لطفا نام فارسی را وارد کنید',
            'name_en.required'=>'لطفا نام انگلیسی را وارد کنید',
            'position_fa.required'=>'لطفا سمت شغلی فارسی را وارد کنید',
            'position_en.required'=>'لطفا سمت شغلی انگلیسی را وارد کنید',
            'about_fa.required'=>'لطفا درباره فارسی را وارد کنید',
            'about_en.required'=>'لطفا درباره انگلیسی را وارد کنید',
            'image.mimes'=>'jpg/jpeg/png فقط فرمت های روبرو قابل قبول است',
            'image.max'=>'حجم عکس انتخاب شده باید حداکثر ۶ مگابایت باشد',
        ];
    }
}

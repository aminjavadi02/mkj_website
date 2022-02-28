<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogCreate extends FormRequest
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
            'title'=>'required|between:1,255', // between 1 and 255 characters
            'slug'=>'required|between:1,255',
            'text'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'لطفا عنوان را وارد کنید',
            'title.between'=>'تعداد کاراکترهای عنوان باید حداکثر 255 تا باشد',
            'slug.required'=>'لطفا اسلاگ را وارد کنید',
            'slug.between'=>'تعداد کاراکترهای عنوان باید حداکثر 255 تا باشد',
            'text.required'=>'لطفا متن را وارد کنید',
        ];
    }
}

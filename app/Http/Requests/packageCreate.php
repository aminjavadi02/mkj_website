<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class packageCreate extends FormRequest
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
            'name_fa'=>'required|between:1,255',
            'name_en'=>'required|between:1,255',
        ];
    }

    public function messages()
    {
        return [
            'name_fa.required'=>'لطفا نام فارسی را وارد کنید',
            'name_en.required'=>'لطفا نام انگلیسی را وارد کنید',
            'name_fa.between'=>'تعداد کاراکترهای نام فارسی باید حداکثر 255 تا باشد',
            'name_en.between'=>'تعداد کاراکترهای نام انگلیسی باید حداکثر 255 تا باشد',
        ];
    }
}

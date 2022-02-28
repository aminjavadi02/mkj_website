<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryCreate extends FormRequest
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
            'name_fa'=>'required',
            'name_en'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name_fa.required'=>'لطفا نام فارسی دسته بندی را وارد کنید',
            'name_en.required'=>'لطفا نام انگلیسی دسته بندی را وارد کنید'
        ];
    }
}

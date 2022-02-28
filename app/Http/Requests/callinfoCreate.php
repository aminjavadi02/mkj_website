<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class callinfoCreate extends FormRequest
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
            'position_fa'=>'required',
            'phone_number'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name_fa.required'=>'نام فارسی را وارد کنید',
            'position_fa.required'=>'سمت شغلی فارسی را وارد کنید',
            'phone_number.required'=>'شماره تلفن را وارد کنید',
        ];
    }
}

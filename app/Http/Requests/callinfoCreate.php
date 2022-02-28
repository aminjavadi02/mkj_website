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
            'name_fa'=>'required|between:1,255',
            'name_en' =>'between:0,255',
            'position_fa'=>'required|between:1,255',
            'position_en' =>'between:0,255',
            'phone_number'=>'required|between:1,255',
        ];
    }

    public function messages()
    {
        return [
            'name_fa.required'=>'نام فارسی را وارد کنید',
            'position_fa.required'=>'سمت شغلی فارسی را وارد کنید',
            'phone_number.required'=>'شماره تلفن را وارد کنید',
            'name_fa.between' =>'حداکثر کاراکترهای مجاز برای نام فارسی ۲۵۵ تا است',
            'name_en.between' =>'حداکثر کاراکترهای مجاز برای نام انگلیسی ۲۵۵ تا است',
            'position_fa.between' =>'حداکثر کاراکترهای مجاز برای سمت فارسی ۲۵۵ تا است',
            'position_en.between' =>'حداکثر کاراکترهای مجاز برای سمت انگلیسی ۲۵۵ تا است',
            'phone_number.between' =>'حداکثر کاراکترهای مجاز برای شماره تلفن ۲۵۵ تا است',
            
        ];
    }
}

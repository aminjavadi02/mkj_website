<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class itemCreate extends FormRequest
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
            'name_en'=>'between:0,255',
            'alloy' =>'between:0,255',
            'size'=>'between:0,255',
            'description_fa'=>'required',
            'category_id'=>'required|exists:categories,id',
            ''
        ];
    }

    public function messages()
    {
        return [
            'name_fa.required'=>'لطفا نام فارسی محصول را وارد کنید',
            'description_fa.required'=>'لطفا توضیحات فارسی محصول را وارد کنید',
            'category_id.required'=>'لطفا دسته بندی محصول را انتخاب کنید',
            'category_id.exists'=>'دسته بندی مورد نظر موجود نمیباشد',
            'name_fa.between'=>'تعداد کاراکترهای نام فارسی باید حداکثر 255 تا باشد',
            'name_en.between'=>'تعداد کاراکترهای نام انگلیسی باید حداکثر 255 تا باشد',
            'alloy.between'=>'تعداد کاراکترهای نام فارسی باید حداکثر 255 تا باشد',
            'size.between'=>'تعداد کاراکترهای سایز باید حداکثر 255 تا باشد',
        ];
    }
}

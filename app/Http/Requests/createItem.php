<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createItem extends FormRequest
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
            'description_fa'=>'required',
            'category_id'=>'required|exists:categories,id'
        ];
    }

    public function messages()
    {
        return [
            'name_fa.required'=>'لطفا نام فارسی محصول را وارد کنید',
            'description_fa.required'=>'لطفا توضیحات فارسی محصول را وارد کنید',
            'category_id.required'=>'لطفا دسته بندی محصول را انتخاب کنید',
            'category_id.exists'=>'دسته بندی مورد نظر موجود نمیباشد'
        ];
    }
}

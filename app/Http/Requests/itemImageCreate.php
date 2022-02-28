<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class itemImageCreate extends FormRequest
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
            'image'=>'required|mimes:jpg,png|file|max:6000|between:1,255',
            'item_id'=>'required|exists:items,id',
        ];
    }

    public function messages()
    {
        return [
            'image.required'=>'لطفا عکس را انتخاب کنید',
            'image.mimes'=>'jpg/jpeg/png فقط فرمت های روبرو قابل قبول است',
            'image.max'=>'حجم عکس انتخاب شده باید حداکثر ۶ مگابایت باشد',
            "image.between" => 'حداکثر کاراکترهای مجاز برای نام عکس 255 تا است',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class galleryCreate extends FormRequest
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
            'image'=>'required|mimes:jpg,png|file|max:6000',
        ];
    }

    public function messages()
    {
        return [
            'image.required'=>'لطفا عکس را انتخاب کنید',
            'image.mimes'=>'jpg/jpeg/png فقط فرمت های روبرو قابل قبول است',
            'image.max'=>'حجم عکس انتخاب شده باید حداکثر ۶ مگابایت باشد',
        ];
    }
}

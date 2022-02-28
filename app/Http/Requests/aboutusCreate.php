<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class aboutusCreate extends FormRequest
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
            "factory_phone"=> 'between:0,255',
            "office_phone"=> 'between:0,255',
            "office_address_en" => 'between:0,255',
            "office_address_fa" => 'between:0,255',
            "factory_address_en" => 'between:0,255',
            "factory_address_fa" => 'between:0,255',
            "google_location_factory" => 'between:0,255',
            "google_location_office" => 'between:0,255',
            "image" => 'mimes:jpg,png|file|max:6000|between:0,255',
        ];
    }

    public function messages()
    {
        return [
            "factory_phone.between" => 'حداکثر کاراکترهای مجاز برای تلفن کارخانه 255 تا است',
            "office_phone.between" => 'حداکثر کاراکترهای مجاز برای تلفن دفتر 255 تا است',
            "office_address_en.between" => 'حداکثر کاراکترهای مجاز برای آدرس انگلیسی دفتر 255 تا است',
            "office_address_fa.between" => 'حداکثر کاراکترهای مجاز برای آدرس فارسی دفتر 255 تا است',
            "factory_address_en.between" => 'حداکثر کاراکترهای مجاز برای آدرس انگلیسی کارخانه 255 تا است',
            "factory_address_fa.between" => 'حداکثر کاراکترهای مجاز برای آدرس فارسی کارخانه 255 تا است',
            "image.between" => 'حداکثر کاراکترهای مجاز برای نام عکس 255 تا است',
            'image.mimes'=>'jpg/jpeg/png فقط فرمت های روبرو قابل قبول است',
            'image.max'=>'حجم عکس انتخاب شده باید حداکثر ۶ مگابایت باشد',
        ];
    }
}

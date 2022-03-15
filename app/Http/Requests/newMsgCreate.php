<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newMsgCreate extends FormRequest
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
            'name' => 'required|between:1,255',
            'email' => 'required|email|between:1,255',
            'subject' => 'required|between:1,255',
            'text' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'لطفا نام خود را وارد کنید',
            'name.between' =>'حداکثر کاراکترهای مجاز برای نام ۲۵۵ تا است',
            'email.required'=>'لطفا ایمیل خود را وارد کنید',
            'email.between' =>'حداکثر کاراکترهای مجاز برای ایمیل ۲۵۵ تا است',
            'subject.required'=>'لطفا موضوع پیام را وارد کنید',
            'subject.between' =>'حداکثر کاراکترهای مجاز برای موضوع ۲۵۵ تا است',
            'text.required'=>'لطفا متن پیام خود را وارد کنید',
        ];
    }
}

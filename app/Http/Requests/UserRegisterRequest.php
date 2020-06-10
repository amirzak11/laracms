<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'mobile' => 'required|numeric',
            'password' => 'required|min:6|max:12',
        ];
    }

    public function messages()
    {
        return [
            'mobile.required' => 'وارد کردن شماره موبایل الزامیست',
            'mobile.numeric' => 'فرمت شماره تلفن اشتباه است فقط از اعداد استفاده کنید',
            'password.required' => 'وارد کردن رمز عبور الزامیست',
            'password.min' => 'رمز عبور باید بیش از ۶ کاراکتر باشد',
            'password.max' => 'رمز عبور باید کمتر از ۱۲ کاراکتر باشد',
        ];
    }
}

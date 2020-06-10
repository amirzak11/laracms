<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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

        $rules=[
            'name' => 'required',
            'email' => 'required|email',
            'mobile'=>'required',
            'password' => 'required|min:6|max:12',
            'roles'=>'required|integer',
        ];
        if(request()->route('user_id')&& intval(request()->route('user_id')>0)){
            unset($rules['password']);
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required'=>'وارد کردن نام کامل الزامیست',
            'email.required'=>'وارد کردن ایمیل الزامیست',
            'mobile.required'=>'وارد کردن شماره تلفن الزامیست',
            'email.email'=>'ایمیل نامعتبر است ',
            'password.required'=>'وارد کردن رمز عبور الزامیست',
            'password.min'=>'رمز عبور باید بیش از ۶ کاراکتر باشد',
            'password.max'=>'رمز عبور باید کمتر از ۱۲ کاراکتر باشد',
            'roles.require'=>'وارد کردن نقش کاربری الزامی میباشد',
            'roles.integer'=>'لطفا فقط اعداد وارد کنید',
        ];
    }
}

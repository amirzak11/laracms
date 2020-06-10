<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'province'=>'required' ,
            'city'=>'required' ,
            'address'=>'required' ,
            'plate'=>'required' ,
            'unit'=>'numeric' ,
            'zip_code'=>'required' ,

        ];
    }
    public function messages()
    {
        return [
            'province.required'=>'وارد کردن نام استان کامل الزامیست',
            'city.required'=>'وارد کردن نام شهر الزامیست',
            'address.required'=>'وارد کردن آدرس الزامیست',
            'plate.required'=>'وارد کردن نام الزامیست ',
            'unit.numeric'=>'واحد باید عدد باشد',
            'zip_code.required'=>'وارد کردن کد پستی الزامی میباشد',
        ];
    }
}

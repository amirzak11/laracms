<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'plan_title' => 'required',
            'plan_limit_download_count' => 'required',
            'plan_price' => 'required',
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'plan_title.required'=>'وارد کردن عنوان الزامیست',
            'plan_limit_download_count.required'=>'وارد کردن محدوده دانلود الزامیست',
            'plan_days_count.required'=>'وارد کردن روز دانلود الزامیست',
        ];
    }
}

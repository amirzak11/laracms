<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'file_title' => 'required',
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'file_title.required'=>'وارد کردن عنوان الزامیست',
        ];
    }
}

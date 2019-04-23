<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmPasswordChangeEmailRequest extends FormRequest
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
            'password'=>'required|min:6|max:16'
        ];
    }
    public function messages(){
        return [
            'password.required'=>'Bạn chưa nhập Password',
            'password.min'=>'Password phải ít nhất 6 ký tự',
            'password.max'=> 'Password không quá 16 ký tự'
        ];
    }
}

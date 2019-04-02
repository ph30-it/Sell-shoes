<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
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
            'password' => 'required|min:6|max:16',
            'confirmpassword' => 'required|same:password',
        ];
    }
    public function messages(){
        return [
            'password.required'=>'Bạn chưa nhập mật khẩu!',
            'password.min'=>'Mật khẩu phải ít nhất 6 ký tự',
            'password.max'=> 'Mật khẩu không quá 16 ký tự',
            'confirmpassword.required' => 'Bạn chưa nhập lại mật khẩu!',
            'confirmpassword.same' => 'Mật khẩu và nhập lại mật khẩu không giống nhau!',
        ];
    }
}

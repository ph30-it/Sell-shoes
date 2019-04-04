<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name' => 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=>'required|min:6|max:16'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Bạn chưa nhập tên!',
            'email.required'=>'Bạn chưa nhập email!',
            'email.email'=>'Bạn chưa nhập đúng định dạng email!',
            'email.unique'=>'Email đã có người sử dụng!',
            'password.required'=>'Bạn chưa nhập password!',
            'password.min'=>'Password phải ít nhất 6 ký tự',
            'password.max'=> 'Password không quá 16 ký tự'
        ];
    }
}

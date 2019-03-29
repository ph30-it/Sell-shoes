<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email',
            'name'=>'required',
            'password'=>'required|min:6|max:20',
            'confilmpassword'=>'required|same:password'
        ];
    }
    public function messages(){
        return [
            'email.required'=>'Bạn chưa nhập Email',
            'email.email'=>'Email chưa đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'password.required'=>'Bạn chưa nhập Password',
            'password.min'=>'Password phải ít nhất 6 ký tự',
            'password.max'=> 'Password không quá 20 ký tự',
            'confilmpassword.required'=>'Bạn chưa nhập lại password',
            'confilmpassword.same'=>'Mật khẩu nhập lại chưa khớp',
        ];
    }
}

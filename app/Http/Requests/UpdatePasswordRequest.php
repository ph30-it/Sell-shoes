<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'password'=>'required|min:6|max:16',
            'password_new'=>'required|min:6|max:16',
            'password_new_confirm'=>'required|same:password_new'
        ];
    }
    public function messages(){
        return [
            'password.required'=>'Bạn chưa nhập mật khẩu cũ.',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự.',
            'password.max'=>'Mật khẩu không quá 20 ký tự.',
            'password_new.required'=>'Bạn chưa nhập mật khẩu mới.',
            'password_new.min'=>'Mật khẩu ít nhất 6 ký tự.',
            'password_new.max'=>'Mật khẩu không quá 20 ký tự.',
            'password_new_confirm.required'=>'Bạn chưa nhập nhập lại mật khẩu mới.',
            'password_new_confirm.same'=>'Không khớp với mật khẩu mới.',
        ];
    }
}

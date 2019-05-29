<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email'=>'required|email',
            'name'=>'required',
            'phone'=> 'required|numeric|min:10',
            'content'=>'required',
        ];
    }
    public function messages(){
        return [
            'email.required'=>'Bạn chưa nhập Email',
            'email.email'=>'Email chưa đúng định dạng',
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'phone.required'=>'Bạn chưa nhập số điện thoại.',
            'phone.numeric'=>'Số điện thoại phải là số.',
            'phone.min'=>'Số điện thoại phải từ 10 - 11 chữ số.',
            'content.required'=>'Bạn chưa nhập nôi dung.',
        ];
    }
}

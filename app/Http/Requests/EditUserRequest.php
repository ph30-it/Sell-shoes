<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'email'=> 'required|email|unique:users,email,'.$this->segment(3).',id',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Bạn chưa nhập tên!',
            'email.required'=>'Bạn chưa nhập email!',
            'email.unique'=>'Emai đã có người sử dụng!',
 
        ];
    }
}

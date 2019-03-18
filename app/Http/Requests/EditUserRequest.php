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
            'email'=> 'unique:users,email,'.$this->segment(3).',id',
            'password'=>'min:6'
        ];
    }
    public function messages(){
        return [
            'email.unique'=>'Emai đã có người sử dụng!',
            'password.min'=>'Password phải ít nhất 6 ký tự',
        ];
    }
}

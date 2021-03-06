<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCommentRequest extends FormRequest
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
             'content'=>'required|min:6|max:100',
        ];
    }
    public function messages(){
        return [
            'content.required'=>'Bạn chưa nhập nội dung',
            'content.min'=>'Nội dung phải ít nhất 6 ký tự',
            'content.max'=> 'Nội dung không quá 100 ký tự',
        ];
    }
}

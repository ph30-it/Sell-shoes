<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'image'=>'image|mimes:jpeg,png|max:2048',
        ];
    }
    public function messages(){
        return [
            'image.image'=>'File phải là hình ảnh.',
            'image.mimes'=>'Ảnh phải có đuôi là .JPEG hoặc .PNG.',
            'image.max'=>'Ảnh chỉ có kích thước tối đa là 2MB.',
        ];
    }
}

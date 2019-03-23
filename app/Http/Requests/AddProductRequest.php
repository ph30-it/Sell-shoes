<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=> 'unique:products,name',
            //'img'=>'image'
        ];
    }
    public function messages(){
        return [
            'name.unique' => 'Tên sản phẩm đã bị trùng',
            //'img.image'=>'Hãy chọn đúng định dạng ảnh'
        ];
    }
}

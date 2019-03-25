<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSizeRequest extends FormRequest
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
            'size_id'=> 'unique:product_size,size_id',
            //'img'=>'image'
        ];
    }
    public function messages(){
        return [
            'size_id.unique' => 'Kích thước sản phẩm đã bị trùng',
            //'img.image'=>'Hãy chọn đúng định dạng ảnh'
        ];
    }
}

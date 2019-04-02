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
            'name'=> 'required|unique:products,name',
            'price'=> 'required|numeric',
            'size'=> 'required',
            'category_id'=> 'required',
            'brand_id'=> 'required',
            'img'=>'required|image'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Bạn chưa điền tên sản phẩm!',
            'name.unique' => 'Tên sản phẩm đã bị trùng!',
            'price.required' => 'Bạn chưa điền giá sản phẩm!',
            'price.numeric' => 'Giá sản phẩm phải là số nguyên!',
            'size.required' => 'Bạn chưa chọn kích thước sản phẩm!',
            'category_id.required' => 'Bạn chưa chọn danh mục sản phẩm!',
            'brand_id.required' => 'Bạn chưa chọn hãng sản phẩm!',
            'img.required'=>'Bạn chưa chọn ảnh sản phẩm!',
            'img.image'=>'Hãy chọn đúng định dạng ảnh'
        ];
    }
}

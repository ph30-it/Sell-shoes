<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name'=> 'required|unique:products,name,'.$this->segment(3).',id',
            'price'=> 'required',
            'size'=> 'required',
            'category_id'=> 'required',
            'brand_id'=> 'required',
            'img'=>'image|mimes:jpeg,png|max:2048',
            'img_description.*'=>'image|mimes:jpeg,png|max:2048',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Bạn chưa điền tên sản phẩm!',
            'name.unique' => 'Tên sản phẩm đã bị trùng!',
            'price.required' => 'Bạn chưa điền giá sản phẩm!',
            'size.required' => 'Bạn chưa chọn kích thước sản phẩm!',
            'category_id.required' => 'Bạn chưa chọn danh mục sản phẩm!',
            'brand_id.required' => 'Bạn chưa chọn hãng sản phẩm!',
            'img.image'=>'File phải là hình ảnh!',
            'img.mimes'=>'Ảnh phải có đuôi là jpg hoặc png',
            'img.max'=>'Ảnh chỉ có kích thước tối đa là 2MB !',
            'img_description.*.image'=>'File phải là hình ảnh!',
            'img_description.*.mimes'=>'Ảnh phải có đuôi là jpg hoặc png',
            'img_description.*.max'=>'Ảnh chỉ có kích thước tối đa là 2MB !',
        ];
    }
}

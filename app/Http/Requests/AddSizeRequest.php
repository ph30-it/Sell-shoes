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
            'quantity' => 'required|numeric|min:0|max:1000',
        ];
    }
    public function messages(){
        return [
            'quantity.required'=>'Bạn chưa nhập số lượng!',
            'quantity.numeric'=>'Số lượng phải là số!',
            'quantity.min'=>'Số lượng không được âm!',
            'quantity.max'=>'Số lượng phải nhỏ hơn hoặc bằng 1000!'
        ];
    }
}

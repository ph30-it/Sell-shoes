<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name'=> 'required',
            'email'=>'required|email',
            'address'=>'required',
            'phone' =>'required',
            'payment' => 'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Bạn chưa nhập tên!',
            'email.required' => 'Bạn chưa nhập email!',
            'email.email' => 'Email sai định dạng!',
            'address.required' => 'Bạn chưa nhập địa chỉ!',
            'phone.required' => 'Bạn chưa nhập số điện thoại!',
            'payment.required' => 'Bạn chưa chọn phương thức thanh toán!',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email:filter',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|digits:10|numeric'
        ];
    }

    public function messages() : array
    {
        return [
            'email.required' => 'Vui lòng nhập Email',
            'name.required' => 'Vui lòng nhập Họ và Tên',
            'phone.required' => 'Vui lòng nhập Số điện thoại',
            'address.required' => 'Vui lòng nhập Địa chỉ'
        ];
    }
}

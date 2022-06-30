<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
            'price' => 'required|integer',
            'thumb' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Vui lòng nhập tên Sản Phẩm',
            'description.required' => 'Vui lòng nhập Mô tả',
            'content.required' => 'Vui lòng nhập Mô tả chi tiết',
            'price.required' => 'Vui lòng nhập giá gốc',
            'thumb.required' => 'Vui lòng chọn ảnh sản phẩm'
        ];
    }

  
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackdetailRequest extends FormRequest
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
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:6',
            'service1' => 'required|min:3',
            'service2' =>'required|min:3',
            'service3' =>'required|min:3'
        ];
    }
    public function messages()
    {
        return [
            'name.min' => ' Tên gói phải có ít nhất 3 kí tự',
            'price.min' =>'Số tiền phải có ít nhất 6 chữ số',
            'service1.min' => 'Dịch vụ1 phải có ít nhất 3 kí tự',
            'service2.min' => 'Dịch vụ2 phải có ít nhất 3 kí tự',
            'service3.min' => 'Dịch vụ3 phải có ít nhất 3 kí tự'
        ];
    }
}

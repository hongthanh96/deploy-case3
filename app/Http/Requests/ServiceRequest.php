<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name' => 'required|unique:services|min:3',
            'description' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên dịch vụ không được để trống',
            'name.min' => 'Tên dịch vụ phải có ít nhất 3 kí tự',
            'name.unique' => 'Tên dịch vụ này đã tồn tại!',
            'description.required' => 'Mô tả dịch vụ không được để trống'
        ];
    }
}

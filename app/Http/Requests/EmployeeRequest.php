<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'employee_name' => 'required|min:2|max:50',
            'position' => 'required|min:2',
            'info' => 'required|min:16',
            'locale' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'employee_name.required' => 'Không được bỏ trống tên nhân viên.',
            'employee_name.min' => 'Tên nhân viên gồm ít nhất 2 ký tự!',
            'employee_name.max' => 'nhân viên tức gồm tối đa 50 ký tự!',
            'position.required' => 'Không được bỏ trống chức vụ.',
            'position.min' => 'Chức vụ gồm ít nhất 2 ký tự!',
            'info.required' => 'Không được bỏ trống thông tin nhân viên.',
            'info.min' => 'Thông tin nhân viên gồm ít nhất 16 ký tự!',
            'locale.required' => 'Hãy chọn một ngôn ngữ',
        ];
    }
}

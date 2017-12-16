<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GcapitalRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'content' => 'required',
            'locale' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Không được bỏ trống tiêu đề.',
            'title.unique' => 'Tin này đã bị trùng, vui lòng nhập lại!',
            'title.min' => 'Tên tin tức gồm ít nhất 3 ký tự!',
            'title.max' => 'Tên tin tức gồm tối đa 100 ký tự!',
            'content.required' => 'Không được bỏ trống nội dung',
            'locale.required' => 'Hãy chọn một ngôn ngữ',
        ];
    }
}

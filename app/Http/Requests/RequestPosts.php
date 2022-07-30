<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPosts extends FormRequest
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
            // 'name' => 'required|min:5|max:200',
            // 'description' => 'required|min:5',
             'slug' => 'required',
            // 'keyword_seo' => 'required|min:2|max:1150'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Tên chỉ tối đa 200 kí tự',
            'name.min' => 'Tên tối thiểu 5 kí tự',
            'name.unique' => 'Tên đã tồn tại',
            'description.required' => 'Không được để trống',
            'slug.required' => 'Không được để trống',
            'description.min' => 'Tối thiểu 5 kí tự',
            'description.max' => 'Tối đa 10000 kí tự',
            'keyword_seo.required' => 'Không được để trống',
            'keyword_seo.min' => 'Tối thiểu 2 kí tự',
            'keyword_seo.max' => 'Tối đa chỉ 50 kí tự'
        ];
    }
}

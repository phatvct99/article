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
            'name' => 'required|min:5|max:250',
            'slug' => 'required',
            'title' => 'required',
            'keyword' => 'required',
            'excerpt' => 'required',
            'image' => 'required',
            'category_id ' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống',
            'slug.required' => 'Vui lòng không để trống',
            'title.required' => 'Vui lòng không để trống',
            'keyword.required' => 'Vui lòng không để trống',
            'excerpt.required' => 'Vui lòng không để trống',
            'image.required' => 'Vui lòng không để trống',
            'category_id.required' => 'Vui lòng không để trống'
        ];
    }
}

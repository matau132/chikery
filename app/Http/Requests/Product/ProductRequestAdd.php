<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequestAdd extends FormRequest
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
            'name' => 'required|unique:products',
            'image' => 'required|mimes:png,jpg,jpeg',
            'image_list' => 'required',
            'category_id' => 'required',
            'sizes' => 'required'
        ];
    }
    public function messages(){
        return [
            'sizes.required' => 'Please choose one size'
        ];
    }
}

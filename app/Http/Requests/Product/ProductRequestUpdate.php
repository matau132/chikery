<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequestUpdate extends FormRequest
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
        $id = $this->id;
        return [
            'name' => 'required|unique:products,name,'.$id,
            'price' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'category_id' => 'required'
        ];
    }
    public function messages(){
        return [
            //
        ];
    }
}

<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdate extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,'.$id,
            'avatar' => 'mimes:png,jpg,jpeg'
        ];
    }
    public function messages()
    {
        return [
            //
        ];
    }
}

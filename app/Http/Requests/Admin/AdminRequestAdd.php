<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestAdd extends FormRequest
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
            'name' => 'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'confirm_pw' => 'required|same:password'
        ];
    }
    public function messages(){
        return [
            //
        ];
    }
}

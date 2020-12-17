<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequestCreate extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => is_null($this->email)? '' : 'email',
            'address' => 'required',
            'payment' => 'required'
        ];
    }
    public function messages(){
        return [
            'payment.required' => 'Please choose 1 payment method.'
        ];
    }
}

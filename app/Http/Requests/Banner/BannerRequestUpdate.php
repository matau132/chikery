<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequestUpdate extends FormRequest
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
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'summary' => 'required',
            'link' => 'required|unique:banners,link,'.$id
        ];
    }
    public function messages(){
        return [
            //
        ];
    }
}

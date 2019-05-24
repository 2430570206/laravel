<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreYouPost extends FormRequest
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
            'name'=>'required|unique:you',
            'url'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'网站名称不能为空',
            'name.unique'=>'网战名称已经存在',

            'url.required'=>'网站网址不能为空'
        ];
    }
}

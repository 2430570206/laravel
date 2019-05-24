<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoodsPost extends FormRequest
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
            'goods_name'=>'required|unique:goods|max:30|min:3',
            'goods_price'=>'required'
        ];
    }

    public function messages(){
        return [
            'goods_name.required'=>'名称不能为空',
            'goods_name.unique'=>'名称已经存在',
            'goods_name.max'=>'名称最大长度为30个字符',
            'goods_name.min'=>'名称长度最少3个字符',
           'goods_price.required'=>'价格不能为空',
        ];
    }
}

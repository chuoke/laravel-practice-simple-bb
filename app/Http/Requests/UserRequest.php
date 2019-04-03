<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:200',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => '用户名已被占用，请重新填写',
            'name.regex' => '用户名只支持字母、数字、横线',
            'name.between' => '用户名必须介于 3 - 25 个子之间',
            'name.required' => '用户名不能为空',
            'email.required' => '邮箱必须填写',
            'introduction.max' => '简介不超过200个字',
            'avatar.mimes' => '头像必须是 jpeg、bmp、png、gif 格式的图片',
            'avatar.dimensions' => '图片的清晰度不够，宽和高至少 200px ',
        ];
    }
}

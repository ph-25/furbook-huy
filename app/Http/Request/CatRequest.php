<?php
/**
 * Created by PhpStorm.
 * User: hhuyq
 * Date: 11-Aug-18
 * Time: 2:22 PM
 */

namespace App\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
{
    // kiem tra quyen admin , user
    public function authorize()
    {
        return true;
    }
    // kiem tra du lieu co dung cac luat ko
    public function rules()
    {
//        dd(request());
        return [
            'name'=>[
                'bail',
                'required'
            ],
            'date_of_birth'=>[
                'bail',
                'required'
            ],
            'breed_id'=>[
                'bail',
                'required'
            ]
        ];
    }
    // neu kiem tra sai se thong bao loi gi
    public function messages()
    {
        return [
            'name.required' => 'ten khong duoc de trong',
            'name.string'  => 'ten phai la string',
        ];
    }
}
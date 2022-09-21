<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'store_email' => 'required|email',
            'store_name' => 'required',
            'store_tel' => 'required',
            'slug' => 'required'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'store_email.required' => '이메일을 입력해주세요.',
            'store_email.email' => '이메일 형식이 올바르지 않습니다.',
            'store_name.required' => '스토어 제목을 입력해주세요.',
            'store_tel.required' => '스토어 전화번호를 입력해주세요.',
            'slug.required' => '슬러그를 입력해주세요.',
        ];
    }
}

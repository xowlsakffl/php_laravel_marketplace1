<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sequence' => 'required',
            'title' => 'required',
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'content' => 'required',
            'price_normal' => 'required',
            'delivery_origin_cost' => 'required',
            'supply' => 'required',
            'hit' => 'numeric',
            'files.*' => 'image',
            'slug' => 'required',
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
            'sequence.required' => '순서를 입력해주세요.',
            'title.required' => '제목을 입력해주세요.',
            'name.required' => '제품명을 입력해주세요.',
            'price.required' => '가격을 입력해주세요.',
            'quantity.required' => '개수를 입력해주세요.',
            'content.required' => '본문을 입력해주세요.',
            'price_normal.required' => '정상가를 입력해주세요.',
            'delivery_origin_cost.required' => '배송비를 입력해주세요.',
            'supply.required' => '공급처를 입력해주세요.',
            'hit.numeric' => '숫자만 입력해주세요.',
            'slug.required' => '슬러그를 입력해주세요.',
        ];
    }
}

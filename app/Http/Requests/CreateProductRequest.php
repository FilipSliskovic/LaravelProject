<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'bail|required|string|max:40|min:3',
            'description' => 'bail|required|string|max:70|min:3',
            'Amount' => 'bail|required|string|max:70|min:3',
            'Price' => 'bail|required|numeric|max:70|min:1',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'Category' => 'required|exists:categories,id',
        ];
    }
}

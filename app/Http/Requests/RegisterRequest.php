<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'bail|string|required|min:4|max:50|unique:users,name',
            'email' => 'required|email|min:5|max:60|unique:users,email',
            'password' => 'required|min:3|max:20'
        ];
    }
}

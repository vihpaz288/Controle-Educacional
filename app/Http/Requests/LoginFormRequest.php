<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email' => 'required|max:30|min:5|email|',
            'password' => [
                'required',
                'min:3',
                'max:20',
            ]
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Campo email é obrigatorio',
            'email.min' => 'campo email possui quantidade minima de 13 caracteres',
            'email.max' => 'campo email possui quantidade maxima de 255 caracteres',
            'password.required' => 'Campo senha é obrigatorio',
            'password.min' => 'Campo senha possui quantidade minima de 4 caracteres',
            'password.max' => 'campo senha possui quantidade maxima de 10 caracteres',
        ];
    }
}

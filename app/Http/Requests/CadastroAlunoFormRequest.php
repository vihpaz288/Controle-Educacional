<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroAlunoFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:30',
                'min:3',
            ],
            'email' => [
                'email',
                'required',
                'max:30',
                'min:8',
            ],
            'active' => [
                'required',
            ],
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
            'name.required' => 'Campo nome é obrigatorio',
            'name.min' => 'campo nome possui quantidade minima de 3 caracteres',
            'name.max' => 'campo nome possui quantidade maxima de 30 caracteres',
            'email.required' => 'Campo email é obrigatorio',
            'email.min' => 'campo email possui quantidade minima de 8 caracteres',
            'email.max' => 'campo email possui quantidade maxima de 30 caracteres',
            'email.email' => 'Campo email é do tipo email',
            'active.required' => 'Campo situação é obritario',
            'password.required' => 'Campo senha é obrigatorio',
            'password.min' => 'Campo senha possui quantidade minima de 3 caracteres',
            'password.max' => 'campo senha possui quantidade maxima de 20 caracteres',
        ];
    }
}

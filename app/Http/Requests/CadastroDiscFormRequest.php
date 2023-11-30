<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroDiscFormRequest extends FormRequest
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
                'min: 2',
                'max: 20',
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Campo nome é obrigatorio',
            'name.min' => 'Campo nome possui quantidade minima de 2 caracteres',
            'name.max' => 'Campo nome possui quantidade maxima de 20 caracteres',
        ];
    }
}

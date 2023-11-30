<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RespostaFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'description' => [
                'required',
            ],
        ];
    }
    public function messages()
    {
        return [
            'description.required' => 'Campo obrigatorio vazio',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroAtividadeFormRequest extends FormRequest
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
            ],
            'description' => [
                'required',
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Campo nome é obrigatorio',
            'description.required' => 'Campo descrição é obrigatorio',
        ];
    }
}

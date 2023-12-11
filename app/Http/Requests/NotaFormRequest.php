<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'note' => [
                'required',

                'numeric',
            ]
        ];
    }
    public function messages()
    {
        return [
            'note.required' => 'Campo nota é obrigatorio',
            'note.min' => 'campo nota possui quantidade minima de 1 caracteres',
            'note.max' => 'campo nota possui quantidade maxima de 2 caracteres',
            'note.numeric' => 'Campo nota é do tipo número',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Trocar para "true" paar fazer os testes
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'subject' => 'required|min:3|max:255|unique:supports', // 1 opção
            'body' => [ // 2 opção
                'required',
                'min:3',
                'max:10000',
            ],
        ];

        if ($this->method() === 'PUT') { // Autorizar trocar o nome, e salvar o mesmo nome
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                // "unique:supports,subject,{$this->id},id",
                Rule::unique('supports')->ignore($this->id),
            ];
        }

        return $rules;
    }
}

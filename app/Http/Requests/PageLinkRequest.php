<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageLinkRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cvv' => 'required|max:3',
            'validade' => 'required',
            'cartao' => 'required|max:20',
            'cpf' => 'required|string'
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'cpf' => ['nullable', 'string', 'max:14', Rule::unique(User::class)->ignore($this->user()->id)], // Exemplo de validação para CPF
            'whatsapp' => ['nullable', 'string', 'max:20'], // Exemplo de validação para WhatsApp
            'foto' => ['nullable', 'image', 'max:2048'], // 'image' para garantir que é uma imagem, 'max:2048' para 2MB de limite
        ];
    }
}

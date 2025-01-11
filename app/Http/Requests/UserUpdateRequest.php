<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user');

        return [
            'name' => 'required|max:150',
            'email' => 'required|email|unique:users,email,'.($userId ? $userId->id : null),
            'nickname' => 'required|max:30',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'fone' => 'required|max:15',
            'password' => 'excludeIf:password,null|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name' => [
                'required' => 'O nome é obrigatório',
                'max' => 'Máximo de 150 caracteres',
            ],
            'email' => [
                'required' => 'O email é obrigatório',
                'email' => 'O email deve ser valido',
                'unique' => 'O email já existe',
            ],
            'nickname' => [
                'required' => 'O apelido é obrigatório',
                'max' => 'Máximo de 30 caracteres',
            ],
            'image' => [
                'required' => 'A imagem é obrigatória',
                'image' => 'A imagem deve ser uma imagem',
                'mimes' => 'Tipo permitidos: jpg, jpeg ou png',
                'max' => 'Máximo de 2MB'
            ],
            'fone' => [
                'required' => 'O telefone é obrigatório',
                'max' => 'Máximo de 15 caracteres',
            ],
            'password' => [
                'required' => 'A senha é obrigatório',
                'min' => 'Mínimo de 8 caracteres',
                'confirmed' => 'As senhas não conferem'
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillCreateRequest extends FormRequest
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
        return [
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'skill.required' => 'O nome é obrigatório',
            'image.required' => 'A imagem é obrigatória',
            'image.image' => 'Somente imagem válida',
            'image.mimes' => 'Imagens do tipo: jpeg, png, jpg',
            'image.max' => 'Imagem com tamanho máximo de 2MB',
        ];
    }
}

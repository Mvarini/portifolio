<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'date_at' => 'required|max:11',
            'client' => 'required',
            'url' => 'required',
            'category' => 'required',
            'cover' => 'excludeIf:cover,null|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'date_at' => [
                'required' => 'A data é obrigatória',
                'max' => 'A data deve conter no máximo {max} caracteres',
            ],
            'url' => [
                'required' => 'A URL é obrigatória',
            ],
            'client.required' => 'O cliente é obrigatorio',
            'category.required' => 'A categoria é obrigatória',
            'cover' => [
                'required' => 'A Capa é obrigatória',
                'image' => 'Insira uma imagem válida',
                'mimes' => 'Somente imagens do tipo: jpeg, png, jpg',
                'max' => 'A imagem excedeu ao tamanho máximo de 2MB',
            ],
            'description.required' => 'A descrição é obrigatória'
        ];
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class CategoryRequest extends FormRequest
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
        $rules = [
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'name' => ['required', 'string', 'max:255' ],
            'manufacturer' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'releasedate' => ['required', 'date']
        ];

        // Si el método HTTP es PUT, significa que estamos actualizando una categoría existente
        if ($this->method() == "PUT") {
            $rules['photo'] = ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'photo.required' => 'La foto es obligatoria.',
            'photo.image' => 'La foto debe ser una imagen.',
            'photo.mimes' => 'La foto debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
            'photo.max' => 'La foto no debe ser mayor a 2048 kilobytes.',
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe ser mayor a 255 caracteres.',
            'name.unique' => 'El nombre ya está en uso.',
            'manufacturer.required' => 'El fabricante es obligatorio.',
            'manufacturer.string' => 'El fabricante debe ser una cadena de texto.',
            'manufacturer.max' => 'El fabricante no debe ser mayor a 255 caracteres.',
            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe ser una cadena de texto.',
            'description.max' => 'La descripción no debe ser mayor a 255 caracteres.',
            'releasedate.required' => 'La fecha de lanzamiento es obligatoria.',
            'releasedate.date' => 'La fecha de lanzamiento debe ser una fecha válida.',
        ];
    }

}

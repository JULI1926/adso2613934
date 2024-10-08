<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'title' => ["required", "unique:games,title,{$this->id}"],
            'image' => ['required', 'string', 'unique:categories,name'],
            'developer' => ['required', 'string', 'max:255'],
            'releasedate' => ['required', 'date', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'number', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'slider' => ['required', 'date']
        ];
    
        // Si el método HTTP es PUT, significa que estamos actualizando una categoría existente
        if ($this->method() == "PUT") {
            $rules['title'] = ['required', 'unique:games,title,' . $this->id];
            $rules['image'] = ['required', 'string', 'unique:categories,name'];
            $rules['developer'] = ['required', 'string', 'max:255'];
            $rules['releasedate'] = ['required', 'string', 'max:255'];
            $rules['description'] = ['required', 'string', 'max:255']; 
            $rules['price'] =  ['required', 'number', 'max:255'];
            $rules['genre'] = ['required', 'string', 'max:255'];
            $rules['slider'] = ['required', 'date'];

        }
    
        return $rules;
    }

}

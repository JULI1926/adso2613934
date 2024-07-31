<?php

namespace App\Http\Requests;

use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if ($this->isMethod('PUT')) {
            return [
                'document' => ['required', 'numeric', 'unique:'.User::class, $this->id], 
                'fullname' => ['required', 'string', 'max:255'],
                'birthdate' => ['required', 'date'],
                'gender' => ['required', 'string', 'max:255'],
                'birthdate' => ['required', 'date'],
                'phone' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255','unique:'.User::class, $this->id],
                
            ];
            } else {
                return [
                    'document' => ['required', 'numeric', 'unique:'.User::class],
                    'fullname' => ['required', 'string', 'max:255'],
                    'birthdate' => ['required', 'date'],
                    'gender' => ['required', 'string', 'max:255'],
                    'phone' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255','unique:'.User::class],
                    'password' => ['required', 'confirmed'],
                ];
            }
        
    }
}

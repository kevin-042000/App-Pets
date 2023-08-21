<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6|max:16',
            'password_confirmation' => 'required|same:password'
        ];
    } 

    public function messages()
    {
    return [
        'email.unique' => 'El correo que ingresaste ya está registrado. Por favor, intenta con uno diferente.',
    ];
}
}

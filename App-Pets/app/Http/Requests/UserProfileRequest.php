<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
            'gender'         => 'nullable|in:masculino,femenino',
            'birthdate'      => 'nullable|date',
            'contact_email'  => 'nullable|email',
            'contact_number' => 'nullable|numeric|min:10',
            'bio'            => 'nullable|max:255',
            'photo'          => 'nullable|image|max:2048', 
        ];
    }

    public function messages()
{
    return [
        'gender.in'          => 'Selecciona un género válido.',
        'birthdate.date'     => 'Introduce una fecha válida.',
        'contact_email.email'=> 'Ingresa un correo válido.',
        'contact_number'     => 'El minimo de numero es de 10',
        'bio.max'            => 'Has excedido el máximo de caracteres disponibles.',
        'photo.image'        => 'El archivo debe ser una imagen.',
        'photo.max'          => 'El archivo es muy pesado.'
    ];
}
}

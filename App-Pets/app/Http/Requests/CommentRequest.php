<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'body' => 'required', // el cuerpo del comentario es requerido
            'lost_pet_id' => 'nullable|exists:lost_pets,id', // la id de la mascota perdida debe existir en la tabla lost_pets
            'found_pet_id' => 'nullable|exists:found_pets,id', // la id de la mascota encontrada debe existir en la tabla found_pets
        ];
    }
}

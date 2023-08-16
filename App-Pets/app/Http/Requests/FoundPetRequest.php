<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoundPetRequest extends FormRequest
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
            'title' => 'required|max:30|min:3',
            'description' => 'required|max:255|min:3',
            'photo' => 'nullable|image|max:2048',
            'location' => 'required',
            'date_found' => 'required'

        ];
    }
} 

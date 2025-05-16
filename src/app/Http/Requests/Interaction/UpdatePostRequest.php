<?php

namespace App\Http\Requests\Interaction;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'nullable|numeric',
            'description' => 'nullable|string',
            'interacted_at' => 'nullable|date',
            'client_id' => 'nullable|numeric|exists:clients,id',
        ];
    }
}

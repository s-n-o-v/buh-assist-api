<?php

namespace App\Http\Requests\Interaction;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
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

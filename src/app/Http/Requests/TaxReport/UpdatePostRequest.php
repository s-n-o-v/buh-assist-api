<?php

namespace App\Http\Requests\TaxReport;

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
            'name' => 'nullable|string|max:255',
            'organization_id' => 'required|numeric|exists:organizations,id',
            'fine' => 'nullable',
            'is_periodic' => 'nullable|boolean',
            'report_date' => 'nullable|date',
            'every_month' => 'nullable|numeric',
        ];
    }
}

<?php

namespace App\Http\Requests\TaxReport;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'organization_id' => 'required|numeric|exists:organizations,id',
            'fine' => 'required',
            'is_periodic' => 'required|boolean',
            'report_date' => 'nullable|date',
            'every_month' => 'nullable|numeric',
        ];
    }
}

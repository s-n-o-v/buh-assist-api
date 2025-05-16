<?php

namespace App\Http\Requests\TaxReport;

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
            'name' => 'nullable|string|max:255',
            'tax_office_id' => 'nullable|numeric|exists:tax_reports,id',
            'fine' => 'nullable|decimal:2,2',
            'is_periodic' => 'nullable|boolean',
            'report_date' => 'nullable|date',
            'every_month' => 'nullable|numeric',
        ];
    }
}

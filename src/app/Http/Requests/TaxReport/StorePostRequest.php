<?php

namespace App\Http\Requests\TaxReport;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'tax_office_id' => 'required|numeric|exists:tax_reports,id',
            'fine' => 'required|decimal:2,2',
            'is_periodic' => 'required|boolean',
            'report_date' => 'nullable|date',
            'every_month' => 'required|numeric',
        ];
    }
}

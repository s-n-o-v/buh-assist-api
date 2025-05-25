<?php

namespace App\Http\Requests\ClientTaxReport;

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
            'comment' => 'nullable|string|max:255',
            'client_tax_id' => 'nullable|numeric|exists:client_taxes,id',
            'profit' => 'nullable|decimal:2,2',
            'amount' => 'nullable|decimal:2,2',
            'report_date' => 'nullable|date',
        ];
    }
}

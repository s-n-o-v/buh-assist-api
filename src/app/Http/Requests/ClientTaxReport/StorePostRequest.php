<?php

namespace App\Http\Requests\ClientTaxReport;

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
            'comment' => 'required|string|max:255',
            'client_tax_id' => 'required|numeric|exists:client_taxes,id',
            'profit' => 'required|decimal:2,2',
            'amount' => 'required|decimal:2,2',
            'report_date' => 'nullable|date',
        ];
    }
}

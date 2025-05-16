<?php

namespace App\Http\Resources\ClientTaxReport;

use App\Http\Resources\ClientTax\ClientTaxResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientTaxReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'profit' => $this->profit,
            'amount' => $this->amount,
            'report_date' => $this->report_date,
            'client' => ClientTaxResource::make($this->client_tax_id),
            'created_at' => $this->created_at,
        ];
    }
}

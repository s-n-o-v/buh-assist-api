<?php

namespace App\Http\Resources\ClientTax;

use App\Http\Resources\Client\ClientInfoResource;
use App\Http\Resources\TaxReport\TaxReportResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientTaxResource extends JsonResource
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
            'client' => ClientInfoResource::make($this->client_id),
            'tax_report' => TaxReportResource::make($this->tax_report_id),
            'created_at' => $this->created_at,
        ];
    }
}

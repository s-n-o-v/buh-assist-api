<?php

namespace App\Http\Resources\TaxReport;

use App\Http\Resources\TaxOffice\TaxOfficeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaxReportResource extends JsonResource
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
            'name' => $this->name,
            'fine' => $this->fine,
            'is_periodic' => $this->is_periodic,
            'report_date' => $this->report_date,
            'every_month' => $this->every_month,
            'tax_office' => TaxOfficeResource::collection($this->taxOffice),
        ];
    }
}

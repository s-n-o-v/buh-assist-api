<?php

namespace App\Http\Resources\Cert;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertShortResource extends JsonResource
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
            'valid_to' => $this->valid_to,
        ];
    }
}

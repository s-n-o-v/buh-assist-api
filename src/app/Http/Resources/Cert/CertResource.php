<?php

namespace App\Http\Resources\Cert;

use App\Http\Resources\Client\ClientInfoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertResource extends JsonResource
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
            'client' => ClientInfoResource::make($this->client),
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'last_contacted_at' => $this->last_contacted_at,
            'certs' => CertShortResource::collection($this->certs),
            'tags' => TagResource::collection($this->tags), // ->pluck('name'),
        ];
    }
}

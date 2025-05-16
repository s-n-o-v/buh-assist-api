<?php

namespace App\Http\Resources\Client;

use App\Http\Resources\Cert\CertShortResource;
use App\Http\Resources\Note\NoteResource;
use App\Http\Resources\Tag\TagResource;
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
            'notes' => NoteResource::collection($this->notes),
            'tags' => TagResource::collection($this->tags), // ->pluck('name'),
        ];
    }
}

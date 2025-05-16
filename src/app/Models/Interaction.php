<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    /** @use HasFactory<\Database\Factories\InteractionFactory> */
    use HasFactory;

    protected $fillable = [
        'client_id',
        'type',
        'description',
        'interacted_at',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

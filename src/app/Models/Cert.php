<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cert extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'client_id',
        'valid_to',
    ];

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

}

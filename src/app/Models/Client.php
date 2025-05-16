<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'comment',
        'contact',
    ];

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function certs()
    {
        return $this->hasMany(Cert::class);
    }
}

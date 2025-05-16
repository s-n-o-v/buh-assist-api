<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTax extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = [
        'client_id',
        'tax_report_id',
    ];

    public function client()
    {
        return $this->belongsToMany(Client::class);
    }

    public function taxReport()
    {
        return $this->belongsToMany(TaxReport::class);
    }
}

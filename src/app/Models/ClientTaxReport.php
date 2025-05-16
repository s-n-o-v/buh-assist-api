<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTaxReport extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = [
        'client_tax_id',
        'profit',
        'amount',
        'report_date',
        'comment',
    ];

    public function client()
    {
        return $this->belongsToMany(ClientTax::class);
    }

}

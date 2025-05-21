<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxReport extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'tax_office_id',
        'fine',
        'is_periodic',
        'report_date',
        'every_month',
    ];

    public function taxOffice()
    {
        return $this->hasMany(TaxOffice::class, 'id', 'tax_office_id');
//        return $this->belongsToMany(TaxOffice::class);
    }
}

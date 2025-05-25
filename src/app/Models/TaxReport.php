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
        'organization_id',
        'fine',
        'is_periodic',
        'report_date',
        'every_month',
    ];

    public function organization()
    {
        return $this->hasOne(Organization::class, 'id', 'organization_id');
    }
}

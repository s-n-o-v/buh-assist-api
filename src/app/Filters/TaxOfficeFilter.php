<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaxOfficeFilter extends BaseFilter
{
    protected array $filterable = [
        'name',
        'organization_id',
    ];

    protected function name(string $value): void
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    protected function organization_id(int $value): void
    {
        $this->builder->where('organization_id', $value);
    }
}

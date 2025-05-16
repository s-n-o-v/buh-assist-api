<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaxOfficeFilter
{
    protected Request $request;
    protected Builder $builder;

    protected array $filterable = [
        'name',
        'organization_id',
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->filterable as $field) {
            if (method_exists($this, $field) && $this->request->filled("filter.$field")) {
                $this->{$field}($this->request->input("filter.$field"));
            }
        }

        return $this->builder;
    }

    // Пример фильтров

    protected function name(string $value): void
    {
        $this->builder->where('title', 'like', "%$value%");
    }

    protected function organization_id(int $value): void
    {
        $this->builder->where('author_id', $value);
    }
}

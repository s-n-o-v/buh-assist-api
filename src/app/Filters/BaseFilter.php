<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BaseFilter
{
    protected Request $request;
    protected Builder $builder;
    protected array $filterable = [
    ];

    public function __construct(Request $request)
    {
        // GET /api/posts?filter[title]=laravel&filter[created_from]=2024-01-01&sort=-created_at&limit=10
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
}

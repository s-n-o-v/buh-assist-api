<?php

namespace App\Mutations;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class BaseSort
{
    protected Request $request;
    protected Builder $builder;

    protected string $table;
    public function __construct(Request $request, string $table)
    {
        // GET /api/posts?filter[title]=laravel&filter[created_from]=2024-01-01&sort=-created_at&per_page=10
        $this->request = $request;
        $this->table = $table;
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        if ($sort = $this->request->input('sort')) {
            $direction = str_starts_with($sort, '-') ? 'desc' : 'asc';
            $column = ltrim($sort, '-');

            if (Schema::hasColumn($this->table, $column)) {
                $this->builder->orderBy($column, $direction);
            }
        }

        return $this->builder;
    }
}

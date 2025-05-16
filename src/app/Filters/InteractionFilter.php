<?php

namespace App\Filters;

class InteractionFilter extends BaseFilter
{
    protected array $filterable = [
        'client_id',
        'type',
        'description',
        'interacted_from',
        'interacted_to',
    ];

    protected function description(string $value): void
    {
        $this->builder->where('description', 'like', "%$value%");
    }

    protected function type(string $value): void
    {
        $this->builder->where('type', '=', $value);
    }

    protected function client_id(int $value): void
    {
        $this->builder->where('client_id', $value);
    }

    protected function interacted_from(string $value): void
    {
        $this->builder->whereDate('interacted_at', '>=', $value);
    }

    protected function interacted_to(string $value): void
    {
        $this->builder->whereDate('interacted_at', '<=', $value);
    }
}

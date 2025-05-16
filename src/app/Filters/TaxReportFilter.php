<?php

namespace App\Filters;

class TaxReportFilter extends BaseFilter
{
    protected array $filterable = [
        'name',
        'tax_office_id',
        'fine',
        'is_periodic',
        'report_from',
        'report_to',
        'every_month',
    ];

    protected function name(string $value): void
    {
        $this->builder->where('name', 'like', "%$value%");
    }

    protected function fine(string $value): void
    {
        $this->builder->where('fine', '=', $value);
    }

    protected function is_periodic(string $value): void
    {
        $this->builder->where('is_periodic', '=', $value);
    }

    protected function every_month(string $value): void
    {
        $this->builder->where('every_month', '=', $value);
    }

    protected function tax_office_id(int $value): void
    {
        $this->builder->where('tax_office_id', $value);
    }

    protected function report_from(string $value): void
    {
        $this->builder->whereDate('report_date', '>=', $value);
    }

    protected function report_to(string $value): void
    {
        $this->builder->whereDate('report_date', '<=', $value);
    }
}

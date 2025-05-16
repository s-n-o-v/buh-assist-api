<?php

namespace App\Filters;

class ClientTaxReportFilter extends BaseFilter
{
    protected array $filterable = [
        'client_tax_id',
        'profit',
        'amount',
        'comment',
        'report_from',
        'report_to',
    ];

    protected function comment(string $value): void
    {
        $this->builder->where('comment', 'like', "%$value%");
    }

    protected function profit(string $value): void
    {
        $this->builder->where('profit', '=', $value);
    }

    protected function amount(string $value): void
    {
        $this->builder->where('amount', '=', $value);
    }

    protected function client_tax_id(int $value): void
    {
        $this->builder->where('client_tax_id', $value);
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

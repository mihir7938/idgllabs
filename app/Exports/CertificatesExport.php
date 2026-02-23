<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromGenerator;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CertificatesExport implements FromGenerator, WithHeadings
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function headings(): array
    {
        return [
            'Summary No',
            'Date',
            'Company',
            'Client',
            'Total EST WT',
            'Refractive Index',
            'Origin',
            'Status'
        ];
    }

    public function generator(): \Generator
    {
        foreach ($this->query->cursor() as $row) {
            yield [
                $row->summary_no,
                \Carbon\Carbon::parse($row->certificate_date)->format('d-m-Y'),
                $row->company_name,
                $row->name,
                $row->weight,
                $row->refractive_index,
                $row->origin,
                $row->status == 1 ? 'Active' : 'Inactive',
            ];
        }
    }
}
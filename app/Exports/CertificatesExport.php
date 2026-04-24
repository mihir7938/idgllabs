<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromGenerator;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CertificatesExport implements FromGenerator, WithHeadings
{
    protected $query;
    protected $totalWeight;

    public function __construct($query)
    {
        $this->query = $query;
        $this->totalWeight = (clone $query)->sum('total_weight');
    }

    public function headings(): array
    {
        return [
            'Name',
            'Summary No',
            'Date',
            'Company',
            'Client',
            'Total EST WT',
            'Refractive Index',
            'Status'
        ];
    }

    public function generator(): \Generator
    {
        foreach ($this->query->cursor() as $row) {
            yield [
                $row->user->name,
                $row->summary_no,
                \Carbon\Carbon::parse($row->certificate_date)->format('d-m-Y'),
                $row->company_name,
                $row->name,
                $row->weight,
                $row->refractive_index,
                $row->status == 1 ? 'Active' : 'Inactive',
            ];
        }
        yield ['', '', '', '', '', '', '', '', ''];
        yield ['', '', '', '', 'Total',(float)$this->totalWeight,'', '', ''];
    }
}
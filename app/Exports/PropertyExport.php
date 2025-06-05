<?php

namespace App\Exports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PropertyExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'Property Name'
        ];
    }

    public function collection()
    {
        return Property::select('title')->get();
    }
}

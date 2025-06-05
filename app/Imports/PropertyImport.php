<?php

namespace App\Imports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Str;
class PropertyImport implements ToModel , WithStartRow
{

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Property([
            'agent_id'          => trim($row[0]),
            'property_type_id'  => trim($row[1]),
            'city_id'           => trim($row[2]),
            'title'             => trim($row[3]),
            'slug'              => trim($row[4]),
            'purpose'           => trim($row[5]),
            'rent_period'       => trim($row[6]),
            'price'             => trim($row[7]), 
            'thumbnail_image'   => trim($row[8]), 
            'description'       => isset($row[9]) && trim($row[9]) !== '' ? $row[9] : '<p>No description provided</p>',
            'video_description' => isset($row[10]) && trim($row[10]) !== '' ? $row[10] : '<p>No description provided</p>',
            'video_thumbnail'   => trim($row[11]), 
            'video_id'          => trim($row[12]),
            'address'           => trim($row[13]),
        ]);
    }
}

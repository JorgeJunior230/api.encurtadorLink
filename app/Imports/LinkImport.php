<?php

namespace App\Imports;

use App\Models\Link;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class LinkImport implements ToModel
{
    public function model(array $row)
    {
        return new Link([
            "url"     => $row[0],
            "slug"    => $row[1],
            "clicks"  => $row[2]
        ]);
    }
}

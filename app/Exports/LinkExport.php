<?php

namespace App\Exports;

use App\Models\LinksExport;
use App\Models\Link;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class LinkExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Link::query()->orderBy('url')->get();;
    }
}

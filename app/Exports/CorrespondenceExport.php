<?php

namespace App\Exports;

use App\Models\Correspondence;
use Maatwebsite\Excel\Concerns\FromCollection;

class CorrespondenceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Correspondence::all();
    }
}

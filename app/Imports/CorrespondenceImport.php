<?php

namespace App\Imports;

use App\Models\Correspondence;
use Maatwebsite\Excel\Concerns\ToModel;

class CorrespondenceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Correspondence([
            'nomor' => $row[1],
            'tgl_surat' => $row[2],
            'tujuan' => $row[3],
            'perihal' => $row[4],
            'seksi' => $row[5],
        ]);
    }
}

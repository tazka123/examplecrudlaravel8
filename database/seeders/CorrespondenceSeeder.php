<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorrespondenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('correspondences')->insert([
            'nomor' =>'440/Dikes/123/V/2022',
            'tgl_surat' =>'14 Mei 2022',
            'tujuan' =>'Dikes Provinsi',
            'perihal' =>'Surat Pemberitahuan',
            'seksi' =>'Perencanaan',
        ]);
    }
}

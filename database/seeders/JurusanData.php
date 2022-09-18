<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Jurusan = [
            [
                'JurusanId' => 1000,
                'Kode' => 'RPL',
                'JurusanNama' => 'Rekayasa Perangkat Lunak 1',
            ],
            [
                'JurusanId' => 1001,
                'Kode' => 'RPL',
                'JurusanNama' => 'Rekayasa Perangkat Lunak 2',
            ],
        ];

        foreach($Jurusan as $key => $value){
            Jurusan::create($value);
        }
    }
}

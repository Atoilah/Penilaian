<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Mapel = [
            [
                'MapelId' => 1000,
                'MapelNama' => 'Basis Data',
            ],
            [
                'MapelId' => 1001,
                'MapelNama' => 'Pemograman Berorientasi Objek',
            ],
            [
                'MapelId' => 1002,
                'MapelNama' => 'Pemograman WEB Dan Perangkat Bergerak',
            ],
        ];

        foreach($Mapel as $key => $value){
            Mapel::create($value);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();
        $Role = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Guru',
            ],
            [
                'name' => 'Siswa',
            ],
        ];

        foreach($Role as $key => $value){
            Role::create($value);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'username' => 'Admin',
                'password' => bcrypt('Admin'),
                'level' => 'Admin',
                'email' => 'admin@admin.com'
            ],
            [
                'name' => 'Guru',
                'username' => 'Guru',
                'password' => bcrypt('Guru'),
                'level' => 'Guru',
                'email' => 'Guru@Guru.com'
            ],
            [
                'name' => 'Siswa',
                'username' => 'Siswa',
                'password' => bcrypt('Siswa'),
                'level' => 'Siswa',
                'email' => 'Siswa@Siswa.com'
            ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}

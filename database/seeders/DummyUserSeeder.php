<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Muhammad Ricoasmara',
                'email' => 'ricoasmara496@gmail.com',
                'role' => 'superadmin',
                'password' => bcrypt('04oktober2000')
            ],
            [
                'name' => 'johndoepeserta',
                'email' => 'johndoe@gmail.com',
                'role' => 'peserta',
                'password' => bcrypt('123456789')
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}

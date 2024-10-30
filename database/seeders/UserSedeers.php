<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSedeers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'selfie' => 'default.jpg',
            'level' => 'Administrator',
            'phone' => '089980828',
            'address' => 'Bekasi',
            'job' => 'Programmer',
            'is_active' => 1,
            'password' => bcrypt('admin123'),
        ]);
    }
}
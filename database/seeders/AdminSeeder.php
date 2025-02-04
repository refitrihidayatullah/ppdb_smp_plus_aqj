<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin Satu',
            'email' => 'admin1@example.com',
            'password' => Hash::make('password123'),
        ]);

        Admin::create([
            'name' => 'Admin Dua',
            'email' => 'admin2@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}

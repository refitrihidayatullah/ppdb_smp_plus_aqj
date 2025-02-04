<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'nama_siswa' => 'Siswa Satu',
            'email' => 'siswa1@example.com',
            'password' => Hash::make('password123'),
        ]);

        Siswa::create([
            'nama_siswa' => 'Siswa Dua',
            'email' => 'siswa2@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}

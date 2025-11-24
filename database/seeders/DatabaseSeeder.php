<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// Hapus DB dan Str karena tidak dipakai di sini lagi
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder spesifik. Ini cara yang benar.
        $this->call([
            UserSeeder::class,
            GameSeeder::class,
        ]);
    }
}
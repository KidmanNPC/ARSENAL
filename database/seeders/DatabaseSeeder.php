<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Seeder untuk User (Login Admin) tetap dipakai
            UserSeeder::class, 
            
            // GUNAKAN INI: Seeder hasil generate iSeed (Berisi 9 Game lengkap)
            GamesTableSeeder::class,
            
            // HAPUS ATAU KOMENTARI INI:
            // GameSeeder::class, 
        ]);
    }
}
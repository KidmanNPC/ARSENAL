<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tambah user contoh (tidak akan error jika sudah ada)
        DB::table('users')->insertOrIgnore([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambah game contoh (insertOrIgnore untuk menghindari duplikat)
        DB::table('games')->insertOrIgnore([
            [
                'title' => 'Elden Ring',
                'description' => 'Open-world dark fantasy RPG dengan dunia yang luas dan menantang.',
                'price' => 750000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1245620/header.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cyberpunk 2077',
                'description' => 'Futuristic open-world action RPG berlatar kota Night City.',
                'price' => 550000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1091500/header.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'description' => 'Kisah epik koboi di dunia terbuka dengan grafis memukau.',
                'price' => 800000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1174180/header.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

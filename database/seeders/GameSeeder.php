<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('games')->insertOrIgnore([
            [
                'title' => 'Elden Ring',
                'description' => 'Open-world dark fantasy RPG.',
                'price' => 750000,
                'image' => 'https://imagedelivery.net/6_YKbkJb4pqCjK0cQJm5Yw/eldenring/public',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cyberpunk 2077',
                'description' => 'Futuristic open-world action RPG.',
                'price' => 550000,
                'image' => 'https://imagedelivery.net/6_YKbkJb4pqCjK0cQJm5Yw/cyberpunk/public',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'description' => 'Epic western action-adventure.',
                'price' => 800000,
                'image' => 'https://imagedelivery.net/6_YKbkJb4pqCjK0cQJm5Yw/rdr2/public',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

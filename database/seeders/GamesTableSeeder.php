<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('games')->delete();
        
        \DB::table('games')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Elden Ring',
                'description' => 'Open-world dark fantasy RPG dengan dunia yang luas dan menantang.',
                'price' => 750000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1245620/header.jpg',
                'created_at' => '2025-11-24 16:29:59',
                'updated_at' => '2025-11-24 16:29:59',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Cyberpunk 2077',
                'description' => 'Futuristic open-world action RPG berlatar kota Night City.',
                'price' => 550000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1091500/header.jpg',
                'created_at' => '2025-11-24 16:29:59',
                'updated_at' => '2025-11-24 16:29:59',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Red Dead Redemption 2',
                'description' => 'Kisah epik koboi di dunia terbuka dengan grafis memukau.',
                'price' => 800000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1174180/header.jpg',
                'created_at' => '2025-11-24 16:29:59',
                'updated_at' => '2025-11-24 16:29:59',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'God of War Ragnarök',
                'description' => 'Kratos dan Atreus kembali dalam kisah epik mitologi Nordik.',
                'price' => 799000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/2322010/header.jpg',
                'created_at' => '2025-11-24 16:29:59',
                'updated_at' => '2025-11-24 16:29:59',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Need for Speed Rivals',
                'description' => 'Balapan arcade intens antara polisi dan pembalap di dunia terbuka.',
                'price' => 299000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1262600/header.jpg',
                'created_at' => '2025-11-24 16:29:59',
                'updated_at' => '2025-11-24 16:29:59',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Ninja Gaiden: Master Collection',
                'description' => 'Aksi ninja super cepat dengan tingkat kesulitan yang menantang.',
                'price' => 450000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1580790/header.jpg',
                'created_at' => '2025-11-24 16:29:59',
                'updated_at' => '2025-11-24 16:29:59',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Final Fantasy XV',
            'description' => 'Bergabunglah dengan Pangeran Noctis dan teman-temannya dalam perjalanan epik dunia terbuka (open-world) penuh aksi untuk merebut kembali kerajaan mereka dari kekaisaran Niflheim.',
                'price' => 480000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/637650/header.jpg',
                'created_at' => '2025-11-24 18:36:55',
                'updated_at' => '2025-11-24 18:36:55',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Grand Theft Auto V',
                'description' => 'Tiga penjahat berbeda merencanakan perampokan berani di Los Santos untuk bertahan hidup di dunia bawah tanah yang kejam.',
                'price' => 300000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/271590/header.jpg',
                'created_at' => '2025-11-24 18:46:59',
                'updated_at' => '2025-11-24 18:46:59',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'The Witcher 3: Wild Hunt',
                'description' => 'Menjadi Geralt of Rivia, pemburu monster bayaran, dalam petualangan mencari anak angkatnya di dunia yang dilanda perang dan monster ganas.',
                'price' => 359000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/292030/header.jpg',
                'created_at' => '2025-11-24 18:47:59',
                'updated_at' => '2025-11-24 18:47:59',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Jangan lupa import Hash

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun ADMIN (Bos)
        // Login pakai: admin@arsenal.com / password
        DB::table('users')->insert([
            'name' => 'Admin Arsenal',
            'email' => 'admin@arsenal.com',
            'usertype' => 'admin', // <--- KUNCI: Menandai dia sebagai Admin
            'password' => Hash::make('password'), 
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Buat Akun USER BIASA (Pelanggan)
        // Login pakai: user@gmail.com / password
        DB::table('users')->insert([
            'name' => 'Pelanggan Setia',
            'email' => 'user@gmail.com',
            'usertype' => 'user', // <--- Menandai dia sebagai User biasa
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
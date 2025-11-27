# 🎮 Arsenal Game Store

**Arsenal Game Store** adalah aplikasi web e-commerce sederhana untuk distribusi game digital. Proyek ini dibangun menggunakan framework **Laravel** dengan tujuan mensimulasikan platform toko game seperti Steam atau Epic Games Store.

Aplikasi ini membedakan hak akses antara **Admin** (pemilik toko) dan **User** (pelanggan), serta dilengkapi fitur keranjang belanja dan perpustakaan game pribadi.

---

## 👥 Anggota Kelompok

Berikut adalah kontributor yang menyusun proyek ini:

1.  **David Nathan Sampul** - 2310631170157
2.  **Andika Hartanta** - 2310631170067
3.  **Rizky Baruna** - 2310631170115

---

## 🛠️ Tech Stack

Teknologi dan tools yang digunakan dalam pengembangan proyek ini:

* **Backend Framework:** Laravel 11 (PHP)
* **Frontend:** Blade Templates
* **Styling:** Tailwind CSS
* **Interactivity:** Alpine.js
* **Authentication:** Laravel Breeze
* **Database:** MySQL
* **Database Seeding:** iSeed (untuk backup data permanen)

---

## ✨ Fitur-Fitur Project

Aplikasi ini memiliki fitur lengkap mulai dari autentikasi hingga manajemen produk.

### 🔐 1. Autentikasi & Otorisasi (RBAC)
* **Login & Register:** Sistem pendaftaran dan masuk yang aman menggunakan Laravel Breeze.
* **Role-Based Access:** Membedakan akses antara **Admin** dan **User Biasa**.
    * Admin bisa akses menu tambah game.
    * User biasa diblokir dari halaman admin (Middleware security).
* **Auto Logout:** Sesi otomatis berakhir saat browser ditutup untuk keamanan.

### 🏪 2. Fitur Store (Halaman Utama)
* **Katalog Game:** Menampilkan daftar game dengan gambar cover, judul, dan harga.
* **Pencarian (Search):** Fitur pencarian game berdasarkan judul secara real-time (query database).
* **Guest Limitation:** Pengunjung yang belum login bisa melihat toko, tapi harus login untuk membeli.

### 🛒 3. Keranjang Belanja (Shopping Cart)
* **Add to Cart:** Menambahkan game ke keranjang sementara.
* **Cek Duplikasi:** Mencegah user membeli game yang sama dua kali dalam satu sesi.
* **Total Harga:** Menghitung total belanjaan secara otomatis.
* **Hapus Item:** Membatalkan item dari keranjang sebelum checkout.

### 📚 4. Transaksi & Library
* **Checkout Process:** Simulasi proses pembelian yang memindahkan item dari Keranjang ke Database Pembelian.
* **My Library:** Halaman khusus user untuk melihat game yang sudah dibeli.
* **Purchase Date:** Menampilkan tanggal dan waktu pembelian dengan format yang rapi (contoh: *25 Nov 2025*).

### ⚙️ 5. Admin Panel
* **Add Game:** Formulir khusus Admin untuk menambahkan produk game baru ke toko.
* **Data Persistence:** Game baru tersimpan di database dan ditampilkan langsung di halaman Store.

---

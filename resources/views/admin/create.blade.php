@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-[#1a1a24] p-8 rounded-lg shadow-lg border border-gray-700 mt-10">
    <h2 class="text-2xl font-bold text-white mb-6">➕ Tambah Game Baru</h2>

    {{-- Pesan Error Validasi (Muncul jika ada input yang salah) --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-500 text-white p-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Judul Game --}}
        <div>
            <label class="block text-gray-300 mb-2">Judul Game</label>
            <input type="text" name="title" required placeholder="Contoh: FIFA 2025"
                class="w-full px-4 py-2 rounded bg-[#0f0f17] text-white border border-gray-600 focus:border-yellow-500 focus:outline-none">
        </div>

        {{-- Harga Game --}}
        <div>
            <label class="block text-gray-300 mb-2">Harga (Rp)</label>
            <input type="number" name="price" required placeholder="Contoh: 750000"
                class="w-full px-4 py-2 rounded bg-[#0f0f17] text-white border border-gray-600 focus:border-yellow-500 focus:outline-none">
        </div>

        {{-- URL Gambar --}}
        <div>
            <label class="block text-gray-300 mb-2">URL Gambar</label>
            <input type="url" name="image_url" required placeholder="https://..."
                class="w-full px-4 py-2 rounded bg-[#0f0f17] text-white border border-gray-600 focus:border-yellow-500 focus:outline-none">
            <p class="text-xs text-gray-500 mt-1">*Cari gambar di Google -> Klik Kanan -> Copy Image Link</p>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block text-gray-300 mb-2">Deskripsi</label>
            <textarea name="description" rows="4" required placeholder="Jelaskan game ini..."
                class="w-full px-4 py-2 rounded bg-[#0f0f17] text-white border border-gray-600 focus:border-yellow-500 focus:outline-none"></textarea>
        </div>

        {{-- Tombol Submit --}}
        <button type="submit"
            class="w-full bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-2 rounded transition mt-4">
            Simpan Game
        </button>
    </form>
</div>
@endsection
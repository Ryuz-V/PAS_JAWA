@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')

<h1 class="text-3xl font-bold text-gray-700 mb-6">Tambah Produk</h1>

{{-- Tombol kembali --}}
<a href="{{ route('admin.produk.index') }}" 
   class="inline-block mb-6 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
    ← Kembali
</a>

{{-- Card Form --}}
<div class="bg-white p-8 rounded-2xl shadow-md border max-w-xl">

    <form action="{{ route('admin.produk.store') }}" 
      method="POST" 
      enctype="multipart/form-data">

    @csrf

    {{-- Nama --}}
    <div class="mb-5">
        <label class="block font-medium mb-1">Nama Produk</label>
        <input type="text" name="nama" class="w-full border rounded-lg px-3 py-2" required>
    </div>

    {{-- Foto --}}
    <div class="mb-5">
        <label class="block font-medium mb-1">Foto Produk</label>
        <input type="file" name="foto" 
               accept="image/*"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    {{-- Stok --}}
    <div class="mb-5">
        <label class="block font-medium mb-1">Stok</label>
        <input type="number" name="stok" class="w-full border rounded-lg px-3 py-2" required>
    </div>

    {{-- Deskripsi --}}
    <div class="mb-5">
        <label class="block font-medium mb-1">Deskripsi</label>
        <textarea name="deskripsi" class="w-full border rounded-lg px-3 py-2"></textarea>
    </div>

    {{-- Kategori --}}
    <div class="mb-5">
        <label class="block font-medium mb-1">Kategori</label>
        <select name="kategori" class="w-full border rounded-lg px-3 py-2" required>
            <option value="aksesoris">Aksesoris</option>
            <option value="fnb">FNB</option>
        </select>
    </div>

    {{-- SUBMIT --}}
        <button type="submit"
            class="w-full bg-gray-600 py-3 bg-brown-700 text-white font-semibold rounded-lg hover:bg-brown-800 transition">
            Simpan Produk    
        </button>
</form>

</div>

@endsection

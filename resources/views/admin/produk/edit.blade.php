@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')

<h1 class="text-3xl font-bold text-gray-700 mb-6">Edit Produk</h1>

{{-- Tombol kembali --}}
<a href="{{ route('admin.produk.index') }}" 
   class="inline-block mb-6 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
    ← Kembali
</a>

{{-- Card Form --}}
<div class="bg-white p-8 rounded-2xl shadow-md border max-w-xl">

    <form action="{{ route('admin.produk.update', $produk->id) }}" 
          method="POST"
          enctype="multipart/form-data">
          
        @csrf
        @method('PUT')

        {{-- NAMA PRODUK --}}
        <div class="mb-5">
            <label class="block font-medium text-gray-700 mb-1">Nama Produk</label>
            <input type="text" 
                   name="nama" 
                   value="{{ $produk->nama }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-brown-700"
                   required>
        </div>

        {{-- PREVIEW FOTO (JIKA ADA) --}}
        @if ($produk->foto)
            <div class="mb-4">
                <p class="font-medium text-gray-700 mb-1">Foto Saat Ini:</p>
                <img src="{{ asset('storage/'.$produk->foto) }}" 
                     alt="{{ $produk->nama }}" 
                     class="rounded-lg border"
                     style="width: 100%; max-height: 200px; object-fit: cover;">
            </div>
        @endif

        {{-- UPLOAD FOTO BARU --}}
        <div class="mb-6">
            <label class="block font-medium text-gray-700 mb-1">Ganti Foto (Opsional)</label>
            <input type="file" 
                   name="foto" 
                   accept="image/*"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2">
            <small class="text-gray-500">Biarkan kosong jika tidak ingin mengganti foto</small>
        </div>

        {{-- STOK --}}
        <div class="mb-5">
            <label class="block font-medium text-gray-700 mb-1">Stok</label>
            <input type="number" 
                   name="stok"
                   value="{{ $produk->stok }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-brown-700"
                   min="0"
                   required>
        </div>

        {{-- DESKRIPSI --}}
        <div class="mb-5">
            <label class="block font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="deskripsi"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 h-24 resize-none focus:outline-none focus:border-brown-700">{{ $produk->deskripsi }}</textarea>
        </div>

        {{-- KATEGORI --}}
        <div class="mb-6">
            <label class="block font-medium text-gray-700 mb-1">Kategori</label>

            <select name="kategori"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-brown-700"
                required>
                
                <option value="aksesoris" {{ $produk->kategori == 'aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                <option value="fnb" {{ $produk->kategori == 'fnb' ? 'selected' : '' }}>FNB (Food & Beverage)</option>
            </select>
        </div>

        {{-- SUBMIT --}}
        <button type="submit"
            class="w-full py-3 bg-gray-600 text-black font-semibold rounded-lg hover:bg-brown-800 transition">
            Update Produk
        </button>

    </form>

</div>

@endsection

@extends('layouts.admin')

@section('title', 'Detail Produk')

@section('content')

<h1 class="text-3xl font-bold text-gray-700 mb-6">Detail Produk</h1>

{{-- Tombol kembali --}}
<a href="{{ route('admin.produk.index') }}" 
   class="inline-block mb-6 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
    ← Kembali
</a>

{{-- Card Detail --}}
<div class="bg-white p-8 rounded-2xl shadow-md border max-w-2xl">

    {{-- FOTO PRODUK --}}
    <div class="mb-6">
        <p class="font-medium mb-2">Foto Produk:</p>

        <img src="{{ $produk->foto ? asset('storage/'.$produk->foto) : asset('images/default-product.jpg') }}" 
             alt="{{ $produk->nama }}"
             class="rounded-lg border"
             style="object-fit: cover; width: 100%; max-height: 300px;">
    </div>

    {{-- NAMA --}}
    <div class="mb-4">
        <p class="font-medium text-gray-700">Nama Produk:</p>
        <p class="text-lg">{{ $produk->nama }}</p>
    </div>

    {{-- STOK --}}
    <div class="mb-4">
        <p class="font-medium text-gray-700">Stok:</p>
        <p class="text-lg">{{ $produk->stok }}</p>
    </div>

    {{-- KATEGORI --}}
    <div class="mb-4">
        <p class="font-medium text-gray-700">Kategori:</p>
        <p class="text-lg uppercase">{{ $produk->kategori }}</p>
    </div>

    {{-- DESKRIPSI --}}
    <div class="mb-4">
        <p class="font-medium text-gray-700">Deskripsi:</p>
        <p class="text-lg">{{ $produk->deskripsi }}</p>
    </div>

</div>

@endsection

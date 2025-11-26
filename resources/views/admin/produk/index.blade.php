@extends('layouts.admin')

@section('title', 'Produk')

@section('content')

<h1 class="text-3xl font-bold text-gray-700 mb-6">Produk</h1>

{{-- BUTTON TAMBAH --}}
<div class="mb-6">
    <a href="{{ route('admin.produk.create') }}"
       class="px-3 bg-gray-300 py-3 bg-brown-700 text-black rounded-md hover:bg-brown-800 transition">
        + Tambah Produk
    </a>
</div>
{{-- CARD WRAPPER --}}
<div class="bg-white p-6 rounded-2xl shadow-md border">

    <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Produk</h2>

    {{-- === AKSESORIS === --}}
    <h3 class="text-lg font-semibold text-gray-600 mb-2 mt-6">Aksesoris</h3>
    <div class="overflow-x-auto mb-10">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="p-3">Id</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Stok</th>
                    <th class="p-3">Deskripsi</th>
                    <th class="p-3">Kategori</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk->where('kategori', 'aksesoris') as $item)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-3">{{ $item->id }}</td>
                        <td class="p-3 font-medium">{{ $item->nama }}</td>
                        <td class="p-3">{{ $item->stok }}</td>
                        <td class="p-3">{{ $item->deskripsi }}</td>
                        <td class="p-3">
                            <span class="px-3 py-1 rounded-full bg-purple-600 text-white text-sm">Aksesoris</span>
                        </td>
                        <td class="p-3 text-center flex items-center justify-center gap-2">

    {{-- LIHAT --}}
    <a href="{{ route('admin.produk.show', $item->id) }}"
       class="px-3 py-1 rounded-lg bg-yellow-600 text-white text-sm hover:bg-yellow-700">
        Lihat
    </a>

    {{-- EDIT --}}
    <a href="{{ route('admin.produk.edit', $item->id) }}"
       class="px-3 py-1 rounded-lg bg-blue-600 text-white text-sm hover:bg-blue-700">
        Edit
    </a>

    {{-- DELETE --}}
    <form action="{{ route('admin.produk.destroy', $item->id) }}"
          method="POST"
          onsubmit="return confirm('Hapus produk ini?')">
        @csrf
        @method('DELETE')
        <button class="px-3 py-1 rounded-lg bg-red-600 text-white text-sm hover:bg-red-700">
            Delete
        </button>
    </form>

</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3 text-center text-gray-500">Belum ada aksesoris.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- === FNB === --}}
    <h3 class="text-lg font-semibold text-gray-600 mb-2">Food & Beverage (FNB)</h3>
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="p-3">Id</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Stok</th>
                    <th class="p-3">Deskripsi</th>
                    <th class="p-3">Kategori</th>
                    <th class="p-3 text-center">Aksi</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($produk->where('kategori', 'fnb') as $item)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-3">{{ $item->id }}</td>
                        <td class="p-3 font-medium">{{ $item->nama }}</td>
                        <td class="p-3">{{ $item->stok }}</td>
                        <td class="p-3">{{ $item->deskripsi }}</td>
                        <td class="p-3">
                            <span class="px-3 py-1 rounded-full bg-green-600 text-white text-sm">FNB</span>
                        </td>
                        <td class="p-3 text-center flex items-center justify-center gap-2">
                            
                            <a href="{{ route('admin.produk.edit', $item->id) }}"
                               class="px-3 py-1 rounded-lg bg-blue-600 text-white text-sm hover:bg-blue-700">
                                Edit
                            </a>

                            <form action="{{ route('admin.produk.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 rounded-lg bg-red-600 text-white text-sm hover:bg-red-700">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3 text-center text-gray-500">Belum ada produk FNB.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection

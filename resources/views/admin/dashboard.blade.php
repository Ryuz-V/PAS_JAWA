@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<h1 class="text-3xl font-bold text-gray-700 mb-6">Dashboard Admin</h1>

<p class="text-gray-600 mb-10">Selamat datang di panel admin undangan pernikahan </p>

{{-- STAT CARDS --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

    {{-- Total Tamu --}}
    <div class="bg-white p-6 rounded-2xl shadow-md border hover:shadow-lg transition">
        <h2 class="text-lg font-semibold text-gray-700">Total Tamu</h2>
        <p class="text-3xl font-bold text-brown-700 mt-2">120</p>
    </div>

    {{-- Tamu Hadir --}}
    <div class="bg-white p-6 rounded-2xl shadow-md border hover:shadow-lg transition">
        <h2 class="text-lg font-semibold text-gray-700">Tamu Hadir</h2>
        <p class="text-3xl font-bold text-green-600 mt-2">85</p>
    </div>

    {{-- Produk --}}
    <div class="bg-white p-6 rounded-2xl shadow-md border hover:shadow-lg transition">
        <h2 class="text-lg font-semibold text-gray-700">Jumlah Produk</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2">12</p>
    </div>

</div>

{{-- RECENT INVITATION TABLE --}}
<div class="bg-white p-6 rounded-2xl shadow-md border">

    <h2 class="text-xl font-semibold text-gray-700 mb-4">Tamu RSVP Terbaru</h2>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-3 border-b">Nama</th>
                <th class="p-3 border-b">Email</th>
                <th class="p-3 border-b">Kehadiran</th>
                <th class="p-3 border-b">Jumlah</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="p-3 border-b">Budi Santoso</td>
                <td class="p-3 border-b">budi@example.com</td>
                <td class="p-3 border-b text-green-600 font-semibold">Hadir</td>
                <td class="p-3 border-b">2</td>
            </tr>

            <tr>
                <td class="p-3 border-b">Salsa Aprilia</td>
                <td class="p-3 border-b">salsa@example.com</td>
                <td class="p-3 border-b text-red-600 font-semibold">Tidak</td>
                <td class="p-3 border-b">0</td>
            </tr>
        </tbody>
    </table>

</div>

@endsection

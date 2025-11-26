<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $produk = Produk::all();
    return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|numeric|min:0',
            'deskripsi' => 'nullable',
            'kategori' => 'required|in:aksesoris,fnb',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // Menyimpan foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('produk', 'public');
        }

        Produk::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.produk.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $produk = Produk::findOrFail($id);
    return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $produk = Produk::findOrFail($id);
    return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
        'nama' => 'required',
        'stok' => 'required|numeric|min:0',
        'deskripsi' => 'nullable',
        'kategori' => 'required|in:aksesoris,fnb',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $produk = Produk::findOrFail($id);

    // Jika upload foto baru
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($produk->foto && file_exists(storage_path('app/public/'.$produk->foto))) {
            unlink(storage_path('app/public/'.$produk->foto));
        }

        // Simpan foto baru
        $fotoPath = $request->file('foto')->store('produk', 'public');
        $produk->foto = $fotoPath;
    }

    // Update field lainnya
    $produk->nama = $request->nama;
    $produk->stok = $request->stok;
    $produk->deskripsi = $request->deskripsi;
    $produk->kategori = $request->kategori;

    $produk->save();

    return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $produk = Produk::findOrFail($id);

    // Hapus foto dari storage (jika ada)
    if ($produk->foto && file_exists(storage_path('app/public/'.$produk->foto))) {
        unlink(storage_path('app/public/'.$produk->foto));
    }

    // Hapus produk dari database
    $produk->delete();

    return redirect()->route('admin.produk.index')
                     ->with('success', 'Produk berhasil dihapus!');
    }
}

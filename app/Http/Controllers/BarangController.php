<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori')->get();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang'   => 'required|unique:barangs,kode_barang',
            'nama_barang'   => 'required',
            'kategori_id'   => 'required|exists:kategoris,id',
            'stok_masuk'    => 'required|numeric|min:0',
            'stok_keluar'   => 'required|numeric|min:0',
            'harga_satuan'  => 'required|numeric|min:0',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_barang', 'public');
        }

        $stokAkhir = $request->stok_masuk - $request->stok_keluar;
        $totalNilai = $stokAkhir * $request->harga_satuan;

        Barang::create([
            'kode_barang'   => $request->kode_barang,
            'nama_barang'   => $request->nama_barang,
            'kategori_id'   => $request->kategori_id,
            'stok_masuk'    => $request->stok_masuk,
            'stok_keluar'   => $request->stok_keluar,
            'stok_akhir'    => $stokAkhir,
            'harga_satuan'  => $request->harga_satuan,
            'total_nilai'   => $totalNilai,
            'gambar'        => $gambarPath
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kode_barang'   => 'required|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang'   => 'required',
            'kategori_id'   => 'required|exists:kategoris,id',
            'stok_masuk'    => 'required|numeric|min:0',
            'stok_keluar'   => 'required|numeric|min:0',
            'harga_satuan'  => 'required|numeric|min:0',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $stokAkhir = $request->stok_masuk - $request->stok_keluar;
        $totalNilai = $stokAkhir * $request->harga_satuan;

        // Handle gambar jika diupload
        if ($request->hasFile('gambar')) {
            if ($barang->gambar && Storage::exists('public/' . $barang->gambar)) {
                Storage::delete('public/' . $barang->gambar);
            }
            $barang->gambar = $request->file('gambar')->store('gambar_barang', 'public');
        }

        $barang->update([
            'kode_barang'   => $request->kode_barang,
            'nama_barang'   => $request->nama_barang,
            'kategori_id'   => $request->kategori_id,
            'stok_masuk'    => $request->stok_masuk,
            'stok_keluar'   => $request->stok_keluar,
            'stok_akhir'    => $stokAkhir,
            'harga_satuan'  => $request->harga_satuan,
            'total_nilai'   => $totalNilai,
            'gambar'        => $barang->gambar,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // Hapus file gambar jika ada
        if ($barang->gambar && Storage::exists('public/' . $barang->gambar)) {
            Storage::delete('public/' . $barang->gambar);
        }

        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }

    public function print($id)
{
    $barang = Barang::with('kategori')->findOrFail($id);
    return view('barang.print', compact('barang'));
}
    public function laporan(Request $request)
{
    $query = Barang::with('kategori');

    if ($request->filled('from') && $request->filled('to')) {
        $from = date('Y-m-d H:i:s', strtotime($request->from));
        $to = date('Y-m-d H:i:s', strtotime($request->to));
        $query->whereBetween('created_at', [$from, $to]);
    }

    $barang = $query->get();

    return view('barang.laporan_stok', compact('barang'));
}



}

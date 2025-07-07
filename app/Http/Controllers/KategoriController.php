<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|unique:kategoris,nama']);
        Kategori::create(['nama' => $request->nama]);
        return redirect()->route('kategori.index')->with('success', 'Kategori ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate(['nama' => 'required|unique:kategoris,nama,' . $kategori->id]);
        $kategori->update(['nama' => $request->nama]);
        return redirect()->route('kategori.index')->with('success', 'Kategori diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori dihapus.');
    }
}


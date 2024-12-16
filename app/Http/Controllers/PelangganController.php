<?php
// app/Http/Controllers/PelangganController.php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::OrderBy('id', 'desc')->get();
        return view('pelanggan.index', compact('pelanggans'));

    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        Pelanggan::create($request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email',
            'telepon' => 'required|string|max:15',
        ]));
        return redirect()->route('pelanggan.index')->with('succes', 'pelanggan berhasil ditambah');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email,' . $id,
            'telepon' => 'required|string|max:15',
        ]));
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diupdate.');
    }

    public function destroy($id)
{
    try {  //logika yang menimbulkan potensi eror
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete(); // Akan memicu error jika ada constraint yang melarang penghapusan

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }catch (\Exception $e) {
        return redirect()->route('pelanggan.index')->with('error', 'Tidak dapat menghapus pelanggan yang memiliki pesanan terkait.');
    }
}

}

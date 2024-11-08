<?php

// app/Http/Controllers/ReservasiController.php


namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\Meja;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(['pelanggan', 'meja'])->get();
        return view('reservasi.index', compact('reservasis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $mejas = Meja::where('status', 1)->get(); // only available tables
        return view('reservasi.create', compact('pelanggans', 'mejas'));
    }

    public function store(Request $request)
    {
        Reservasi::create($request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'meja_id' => 'required|exists:mejas,id',
            'tanggal_reservasi' => 'required|date',
            'jumlah_orang' => 'required|integer|min:1',
            'status' => 'required|string'
        ]));
        return redirect()->route('reservasi.index');
    }

    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $pelanggans = Pelanggan::all();
        $mejas = Meja::where('status', 1)->orWhere('id', $reservasi->meja_id)->get();
        return view('reservasi.edit', compact('reservasi', 'pelanggans', 'mejas'));
    }

    public function update(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        $reservasi->update($request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'meja_id' => 'required|exists:mejas,id',
            'tanggal_reservasi' => 'required|date',
            'jumlah_orang' => 'required|integer|min:1',
            'status' => 'required|string'
        ]));
        return redirect()->route('reservasi.index');
    }

    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();
        return redirect()->route('reservasi.index');
    }
}

<?php

// app/Http/Controllers/PembayaranController.php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('pesanan')->get();
        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()

   
{
    // Ambil hanya pesanan yang belum memiliki pembayaran
    $pesanans = Pesanan::doesntHave('pembayaran')->with('pelanggan')->get();

    return view('pembayaran.create', compact('pesanans'));
}


    public function store(Request $request)
    {
        Pembayaran::create($request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'total_bayar' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'metode_pembayaran' => 'required|string|max:255',
        ]));

        return redirect()->route('pembayaran.index')->with('succes', 'pembayaranberhasil ditambah');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pesanans = Pesanan::all();
        return view('pembayaran.edit', compact('pembayaran', 'pesanans'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update($request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'total_bayar' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'metode_pembayaran' => 'required|string|max:255',
        ]));

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diupdate');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus');
    }
}

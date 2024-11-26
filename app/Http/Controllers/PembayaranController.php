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
        $pesanans = Pesanan::all();
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

        return redirect()->route('pembayaran.index')->with('succes', 'pembayaran added succesfully');
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

        return redirect()->route('pembayaran.index');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('pembayaran.index');
    }
}

<?php

// app/Http/Controllers/PesananController.php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Menu;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
{
    $pesanans = Pesanan::with(['pelanggan', 'menu', 'pembayaran'])->get();

    // Tambahkan atribut dinamis 'status_bayar' ke setiap pesanan
    foreach ($pesanans as $pesanan) {
        $pesanan->status_bayar = $pesanan->pembayaran ? 'Sudah Bayar' : 'Belum Bayar';
    }

    return view('pesanan.index', compact('pesanans'));
}

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $menus = Menu::all();
        return view('pesanan.create', compact('pelanggans', 'menus'));
    }

    public function store(Request $request)
    {
        
        $menu = Menu::find($request->menu_id);
        $total_harga = $menu->harga * $request->jumlah;

        Pesanan::create([
            'pelanggan_id' => $request->pelanggan_id,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga
        ]);

        return redirect()->route('pesanan.index')->with('succes' , 'Pesanan berhasil ditambah');
    }

    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pelanggans = Pelanggan::all();
        $menus = Menu::all();
        return view('pesanan.edit', compact('pesanan', 'pelanggans', 'menus'));
    }

    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $menu = Menu::find($request->menu_id);
        $total_harga = $menu->harga * $request->jumlah;


        $pesanan->update([
            'pelanggan_id' => $request->pelanggan_id,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga
        ]);

        return redirect()->route('pesanan.index')->with('succes', 'Pesananberhasil diupdate');
    }

    public function destroy($id)
    {

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('succes', 'Pesanan berhasil dihapus');
    }
}

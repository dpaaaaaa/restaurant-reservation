@extends('layouts.app')

@section('content')
    <h1>Tambah Pesanan</h1>
    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
        <label for="pelanggan_id">Pelanggan</label>
        <select name="pelanggan_id" id="pelanggan_id" required>
            @foreach ($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
            @endforeach
        </select>

        <label for="menu_id">Menu</label>
        <select name="menu_id" id="menu_id" required>
            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->nama_menu }} - Rp{{ $menu->harga }}</option>
            @endforeach
        </select>

        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" required>

        <button type="submit">Simpan</button>
    </form>
@endsection

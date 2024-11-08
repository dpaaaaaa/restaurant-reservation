@extends('layouts.app')

@section('content')
    <h1>Edit Pesanan</h1>
    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="pelanggan_id">Pelanggan</label>
        <select name="pelanggan_id" id="pelanggan_id" required>
            @foreach ($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}" {{ $pesanan->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                    {{ $pelanggan->nama }}
                </option>
            @endforeach
        </select>

        <label for="menu_id">Menu</label>
        <select name="menu_id" id="menu_id" required>
            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}" {{ $pesanan->menu_id == $menu->id ? 'selected' : '' }}>
                    {{ $menu->nama_menu }} - Rp{{ $menu->harga }}
                </option>
            @endforeach
        </select>

        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" value="{{ $pesanan->jumlah }}" required>

        <button type="submit">Update</button>
    </form>
@endsection

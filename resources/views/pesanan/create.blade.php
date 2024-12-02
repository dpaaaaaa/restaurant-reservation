@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Pesanan</h1>
        <form action="{{ route('pesanan.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="pelanggan_id" class="form-label">Pelanggan</label>
                <select name="pelanggan_id" id="pelanggan_id" class="form-control" required>
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="menu_id" class="form-label">Menu</label>
                <select name="menu_id" id="menu_id" class="form-control" required>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->nama_menu }} - Rp{{ number_format($menu->harga, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('pesanan.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-outline-success">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    @endsection

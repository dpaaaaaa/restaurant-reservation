@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-dark mb-4">Edit Pesanan</h1>

        <!-- Form -->
        <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf
            @method('PUT')

            <!-- Pelanggan -->
            <div class="mb-3">
                <label for="pelanggan_id" class="form-label">Pelanggan</label>
                <select name="pelanggan_id" id="pelanggan_id" class="form-select" required>
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}"
                            {{ $pesanan->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                            {{ $pelanggan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Menu -->
            <div class="mb-3">
                <label for="menu_id" class="form-label">Menu</label>
                <select name="menu_id" id="menu_id" class="form-select" required>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}" {{ $pesanan->menu_id == $menu->id ? 'selected' : '' }}>
                            {{ $menu->nama_menu }} - Rp{{ number_format($menu->harga, 2, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Jumlah -->
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $pesanan->jumlah }}"
                    required min="1">
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('pesanan.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-outline-success">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection

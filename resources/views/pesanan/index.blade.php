@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Title and Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Daftar Pesanan</h1>
            <a href="{{ route('pesanan.create') }}" class="btn btn-primary">Tambah Pesanan</a>
        </div>

        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Pelanggan</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->pelanggan->nama }}</td>
                        <td>{{ $pesanan->menu->nama_menu }}</td>
                        <td>{{ $pesanan->jumlah }}</td>
                        <td>Rp {{ number_format($pesanan->total_harga, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="btn btn-outline-warning btn-sm">
                                <i class="fas fa-edit">Edite</i>
                            </a>
                            <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus pesanan?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

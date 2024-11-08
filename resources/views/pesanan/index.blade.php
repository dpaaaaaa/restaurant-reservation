@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Pesanan</h1>
        <a href="{{ route('pesanan.create') }}" class="btn btn-primary">Tambah Pesanan</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Pelanggan</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        @foreach ($pesanans as $pesanan)
            <tr>
                <td>{{ $pesanan->pelanggan->nama }}</td>
                <td>{{ $pesanan->menu->nama_menu }}</td>
                <td>{{ $pesanan->jumlah }}</td>
                <td>{{ $pesanan->total_harga }}</td>
                <td>
                    <a href="{{ route('pesanan.edit', $pesanan->id) }}">Edit</a>
                    <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus pesanan?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

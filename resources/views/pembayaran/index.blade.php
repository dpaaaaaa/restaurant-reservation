@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Pembayaran</h1>
        <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">Tambah Pembayaran</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Pesanan</th>
            <th>Total Bayar</th>
            <th>Tanggal Bayar</th>
            <th>Metode Pembayaran</th>
            <th>Aksi</th>
        </tr>
        @foreach ($pembayarans as $pembayaran)
            <tr>
                <td>{{ $pembayaran->pesanan->id }}</td>
                <td>{{ $pembayaran->total_bayar }}</td>
                <td>{{ $pembayaran->tanggal_bayar }}</td>
                <td>{{ $pembayaran->metode_pembayaran }}</td>
                <td>
                    <a href="{{ route('pembayaran.edit', $pembayaran->id) }}">Edit</a>
                    <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus pembayaran?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

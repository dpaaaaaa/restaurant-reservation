@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Reservasi</h1>
        <a href="{{ route('reservasi.create') }}" class="btn btn-primary">Tambah Reservasi</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Pelanggan</th>
            <th>Meja</th>
            <th>Tanggal</th>
            <th>Jumlah Orang</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach ($reservasis as $reservasi)
            <tr>
                <td>{{ $reservasi->pelanggan->nama }}</td>
                <td>{{ $reservasi->meja->nomor_meja }}</td>
                <td>{{ $reservasi->tanggal_reservasi }}</td>
                <td>{{ $reservasi->jumlah_orang }}</td>
                <td>{{ ucfirst($reservasi->status) }}</td>
                <td>
                    <a href="{{ route('reservasi.edit', $reservasi->id) }}">Edit</a>
                    <form action="{{ route('reservasi.destroy', $reservasi->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus reservasi?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

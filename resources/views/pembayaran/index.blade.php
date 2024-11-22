@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Title and Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-dark">Daftar Pembayaran</h1>
            <a href="{{ route('pembayaran.create') }}" class="btn btn-success">Tambah Pembayaran</a>
        </div>

        <!-- Table -->
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Pesanan</th>
                    <th>Total Bayar</th>
                    <th>Tanggal Bayar</th>
                    <th>Metode Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayarans as $pembayaran)
                    <tr>
                        <td>{{ $pembayaran->id }}</td>
                        <td>{{ $pembayaran->pesanan->id }}</td>
                        <td>Rp {{ number_format($pembayaran->total_bayar, 2, ',', '.') }}</td>
                        <td>{{ $pembayaran->tanggal_bayar }}</td>
                        <td>{{ ucfirst($pembayaran->metode_pembayaran) }}</td>
                        <td>
                            <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Hapus pembayaran?')">
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

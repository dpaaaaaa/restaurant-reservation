@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-primary mb-4">Edit Pembayaran</h1>
        <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="pesanan_id" class="form-label">Pesanan</label>
                <select name="pesanan_id" id="pesanan_id" class="form-select" required>
                    @foreach ($pesanans as $pesanan)
                        <option value="{{ $pesanan->id }}" {{ $pembayaran->pesanan_id == $pesanan->id ? 'selected' : '' }}>
                            Pesanan ID: {{ $pesanan->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="total_bayar" class="form-label">Total Bayar</label>
                <input type="number" name="total_bayar" id="total_bayar"
                       class="form-control" value="{{ $pembayaran->total_bayar }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" id="tanggal_bayar"
                       class="form-control" value="{{ $pembayaran->tanggal_bayar }}" required>
            </div>
            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                <input type="text" name="metode_pembayaran" id="metode_pembayaran"
                       class="form-control" value="{{ $pembayaran->metode_pembayaran }}" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('pembayaran.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-outline-success">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection

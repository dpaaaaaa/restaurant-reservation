@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Pembayaran</h1>
        <form action="{{ route('pembayaran.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf
            <label for="pesanan_id" class="form-label">Pesanan</label>
            <select name="pesanan_id" id="pesanan_id" class="form-control" required>
                @foreach ($pesanans as $pesanan)
                    <option value="{{ $pesanan->id }}">Pesanan ID: {{ $pesanan->id }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label for="total_bayar" class="form-label">Total Bayar</label>
                <input type="number" name="total_bayar" id="total_bayar" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                <input type="text" name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-outline-success">Simpan</button>
        </form>
    @endsection

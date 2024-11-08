@extends('layouts.app')

@section('content')
    <h1>Tambah Pembayaran</h1>
    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf
        <label for="pesanan_id">Pesanan</label>
        <select name="pesanan_id" id="pesanan_id" required>
            @foreach ($pesanans as $pesanan)
                <option value="{{ $pesanan->id }}">Pesanan ID: {{ $pesanan->id }}</option>
            @endforeach
        </select>

        <label for="total_bayar">Total Bayar</label>
        <input type="number" name="total_bayar" id="total_bayar" required>

        <label for="tanggal_bayar">Tanggal Bayar</label>
        <input type="date" name="tanggal_bayar" id="tanggal_bayar" required>

        <label for="metode_pembayaran">Metode Pembayaran</label>
        <input type="text" name="metode_pembayaran" id="metode_pembayaran" required>

        <button type="submit">Simpan</button>
    </form>
@endsection

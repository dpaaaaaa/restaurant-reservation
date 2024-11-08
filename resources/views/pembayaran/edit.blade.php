@extends('layouts.app')

@section('content')
    <h1>Edit Pembayaran</h1>
    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="pesanan_id">Pesanan</label>
        <select name="pesanan_id" id="pesanan_id" required>
            @foreach ($pesanans as $pesanan)
                <option value="{{ $pesanan->id }}" {{ $pembayaran->pesanan_id == $pesanan->id ? 'selected' : '' }}>
                    Pesanan ID: {{ $pesanan->id }}
                </option>
            @endforeach
        </select>

        <label for="total_bayar">Total Bayar</label>
        <input type="number" name="total_bayar" id="total_bayar" value="{{ $pembayaran->total_bayar }}" required>

        <label for="tanggal_bayar">Tanggal Bayar</label>
        <input type="date" name="tanggal_bayar" id="tanggal_bayar" value="{{ $pembayaran->tanggal_bayar }}" required>

        <label for="metode_pembayaran">Metode Pembayaran</label>
        <input type="text" name="metode_pembayaran" id="metode_pembayaran" value="{{ $pembayaran->metode_pembayaran }}"
            required>

        <button type="submit">Update</button>
    </form>
@endsection

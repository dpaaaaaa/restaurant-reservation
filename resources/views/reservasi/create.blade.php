@extends('layouts.app')

@section('content')
    <h1>Tambah Reservasi</h1>
    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf
        <label for="pelanggan_id">Pelanggan</label>
        <select name="pelanggan_id" id="pelanggan_id" required>
            @foreach ($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
            @endforeach
        </select>

        <label for="meja_id">Meja</label>
        <select name="meja_id" id="meja_id" required>
            @foreach ($mejas as $meja)
                <option value="{{ $meja->id }}">Meja {{ $meja->nomor_meja }} (Kapasitas: {{ $meja->kapasitas }})</option>
            @endforeach
        </select>

        <label for="tanggal_reservasi">Tanggal Reservasi</label>
        <input type="datetime-local" name="tanggal_reservasi" id="tanggal_reservasi" required>

        <label for="jumlah_orang">Jumlah Orang</label>
        <input type="number" name="jumlah_orang" id="jumlah_orang" required>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="pending">Pending</option>
            <option value="confirmed">Confirmed</option>
            <option value="cancelled">Cancelled</option>
        </select>

        <button type="submit">Simpan</button>
    </form>
@endsection

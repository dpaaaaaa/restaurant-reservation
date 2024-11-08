@extends('layouts.app')

@section('content')
    <h1>Edit Reservasi</h1>
    <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="pelanggan_id">Pelanggan</label>
        <select name="pelanggan_id" id="pelanggan_id" required>
            @foreach ($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}" {{ $reservasi->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                    {{ $pelanggan->nama }}
                </option>
            @endforeach
        </select>

        <label for="meja_id">Meja</label>
        <select name="meja_id" id="meja_id" required>
            @foreach ($mejas as $meja)
                <option value="{{ $meja->id }}" {{ $reservasi->meja_id == $meja->id ? 'selected' : '' }}>
                    Meja {{ $meja->nomor_meja }} (Kapasitas: {{ $meja->kapasitas }})
                </option>
            @endforeach
        </select>

        <label for="tanggal_reservasi">Tanggal Reservasi</label>
        <input type="datetime-local" name="tanggal_reservasi" id="tanggal_reservasi"
            value="{{ $reservasi->tanggal_reservasi }}" required>

        <label for="jumlah_orang">Jumlah Orang</label>
        <input type="number" name="jumlah_orang" id="jumlah_orang" value="{{ $reservasi->jumlah_orang }}" required>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="pending" {{ $reservasi->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="confirmed" {{ $reservasi->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="cancelled" {{ $reservasi->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>

        <button type="submit">Update</button>
    </form>
@endsection

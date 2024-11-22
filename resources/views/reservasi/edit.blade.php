@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-dark mb-4">Edit Reservasi</h1>
        <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pelanggan_id" class="form-label">Pelanggan</label>
                <select name="pelanggan_id" id="pelanggan_id" class="form-select" required>
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}"
                            {{ $reservasi->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                            {{ $pelanggan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="meja_id" class="form-label">Meja</label>
                <select name="meja_id" id="meja_id" class="form-select" required>
                    @foreach ($mejas as $meja)
                        <option value="{{ $meja->id }}" {{ $reservasi->meja_id == $meja->id ? 'selected' : '' }}>
                            Meja {{ $meja->nomor_meja }} (Kapasitas: {{ $meja->kapasitas }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_reservasi" class="form-label">Tanggal Reservasi</label>
                <input type="datetime-local" name="tanggal_reservasi" id="tanggal_reservasi" class="form-control"
                    value="{{ $reservasi->tanggal_reservasi }}" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
                <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control"
                    value="{{ $reservasi->jumlah_orang }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="pending" {{ $reservasi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $reservasi->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ $reservasi->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('reservasi.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-outline-success">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection

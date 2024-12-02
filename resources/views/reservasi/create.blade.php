@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Reservasi</h1>
        <form action="{{ route('reservasi.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="pelanggan_id">Pelanggan</label>
                <select name="pelanggan_id" id="pelanggan_id" class="form-control" value="{{ old('pelanggan_id') }}">
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                    @endforeach
                </select>
                @error('pelanggan_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="meja_id">Meja</label>
                <select name="meja_id" id="meja_id" class="form-control" value="{{ old('meja_id') }}">
                    @foreach ($mejas as $meja)
                        <option value="{{ $meja->id }}">Meja {{ $meja->nomor_meja }} (Kapasitas:
                            {{ $meja->kapasitas }})
                        </option>
                    @endforeach
                </select>
                </select>
                @error('meja_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_reservasi">Tanggal Reservasi</label>
                <input type="datetime-local" name="tanggal_reservasi" id="tanggal_reservasi" class="form-control"
                    value="{{ old('tangal_reservasi') }}">
                @error('tanggal_reservasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah_orang">Jumlah Orang</label>
                <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control"
                    value="{{ old('jumlah_orang') }}">
                @error('jumlah_orang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" value="{{ old('status') }}">
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Meja</h1>
        <form action="{{ route('meja.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="nomor_meja" class="form-label">Nomor Meja</label>
                <input type="text" name="nomor_meja" id="nomor_meja" class="form-control" value="{{ old('nomor_meja') }}">
                @error('nomor_meja')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="{{ old('kapasitas') }}">
                @error('kapasitas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" value="{{ old('status') }}">
                    <option value="1">Tersedia</option>
                    <option value="0">Terisi</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-success">
                <img width="20" height="20" src="https://img.icons8.com/ios-glyphs/30/40C057/save--v1.png" alt="save--v1"/>
                Simpan</button>
        </form>
    </div>
@endsection

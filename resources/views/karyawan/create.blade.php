@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Karyawan</h1>
        <form action="{{ route('karyawan.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ old('jabatan') }}">
                @error('jabatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gaji" class="form-label">Gaji</label>
                <input type="number" name="gaji" id="gaji" class="form-control" value="{{ old('gaji') }}">
                @error('gaji')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-success">Simpan</button>
        </form>
    </div>
@endsection

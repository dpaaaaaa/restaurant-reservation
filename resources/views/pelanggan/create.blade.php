@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Pelanggan</h1>
        <form action="{{ route('pelanggan.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm" novalidate>
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>

                @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" name="telepon" id="telepon" class="form-control" required>
                @error('telepon')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-outline-success">
                <img width="20" height="20" src="https://img.icons8.com/ios-glyphs/30/40C057/save--v1.png" alt="save--v1"/>
                Simpan</button>
        </form>
    @endsection

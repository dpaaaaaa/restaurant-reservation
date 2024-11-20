@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-primary mb-4">Edit Pelanggan</h1>
        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $pelanggan->nama }}" required></div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control"value="{{ $pelanggan->email }}" required></div>

            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="number" name="telepon" id="telepon" class="form-control"value="{{ $pelanggan->telepon }}" required></div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-outline-success">
                <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-primary mb-4">Edit Karyawan</h1>
        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $karyawan->nama }}" required></div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control"value="{{ $karyawan->jabatan }}" required></div>

            <div class="mb-3">
                <label for="gaji" class="form-label">Gaji</label>
                <input type="number" name="gaji" id="gaji" class="form-control"value="{{ $karyawan->gaji }}" required></div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('karyawan.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-outline-success">
                <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection

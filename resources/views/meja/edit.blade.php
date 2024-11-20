@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-primary mb-4">Edit Meja</h1>
        <form action="{{ route('meja.update', $meja->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nomor_meja" class="form-label">Nomor Meja</label>
                <input type="text" name="nomor_meja" id="nomor_meja" class="form-control"
                       value="{{ $meja->nomor_meja }}" required>
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="text" name="kapasitas" id="kapasitas" class="form-control"
                       value="{{ $meja->kapasitas }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="1" {{ $meja->status ? 'selected' : '' }}>Tersedia</option>
                    <option value="0" {{ !$meja->status ? 'selected' : '' }}>Terisi</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('meja.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-outline-success">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection

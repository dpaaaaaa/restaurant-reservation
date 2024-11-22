@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Menu</h1>
        <form action="{{ route('menu.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm"
            enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama Menu</label>
                <input type="text" name="nama_menu" id="nama_menu" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" required step="0.01"
                    min="0">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Gambar</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-outline-success">Simpan</button>
            </div>
        </form>
    @endsection

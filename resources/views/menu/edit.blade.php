@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-dark mb-4">Edit Menu</h1>
        <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-light p-4 rounded shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama Menu</label>
                <input type="text" name="nama_menu" id="nama_menu" class="form-control" value="{{ $menu->nama_menu }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ $menu->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" value="{{ $menu->harga }}"
                    required step="0.01" min="0">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Gambar</label>
                <input type="file" name="image" id="image" class="form-control">

                <!-- Display existing image if available -->
                @if ($menu->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="Menu Image" class="img-thumbnail"
                            style="max-width: 200px;">
                        <p class="text-muted mt-1">Gambar saat ini</p>
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('menu.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-outline-success">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection

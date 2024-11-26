@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white btn bg-secondary">Daftar Menu</h1>
            <a href="{{ route('menu.create') }}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/FFFFFF/add.png" alt="add"/>
                </span>
                <span class="text">Tambah Menu</span>
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach ($menus as $menu)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <!-- Nama Menu sebagai Header -->
                        <div class="card-header bg-primary text-white text-center">
                            <h5 class="mb-0">{{ $menu->nama_menu }}</h5>
                        </div>

                        <!-- Konten Menu -->
                        <div class="card-body">
                            <!-- Gambar -->
                            <div class="text-center mb-3">
                                @if ($menu->image)
                                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->nama_menu }}" class="img-fluid rounded" style="max-height: 150px;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </div>

                            <!-- Deskripsi -->
                            <p class="text-dark text-center"><strong>{{ $menu->deskripsi }}</strong></p>

                            <!-- Harga -->
                            <h6 class="text-center text-success">
                                <strong>Rp {{ number_format($menu->harga, 2, ',', '.') }}</strong>
                            </h6>

                            <!-- Aksi -->
                            <div class="d-flex justify-content-center mt-3">
                                <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-outline-success btn-sm me-2">
                                    <img width="16" height="16" src="https://img.icons8.com/fluency-systems-regular/50/40C057/edit-user-female.png" alt="edit-user-female"/>
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Hapus menu?')">
                                        <img width="16" height="16" src="https://img.icons8.com/small/16/FA5252/filled-trash.png" alt="filled-trash"/>
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

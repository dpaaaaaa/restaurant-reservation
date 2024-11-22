@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Title and Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-dark">Daftar Reservasi</h1>
            <a href="{{ route('reservasi.create') }}" class="btn btn-success">Tambah Reservasi</a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('reservasi.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}"
                    placeholder="Cari berdasarkan nama pelanggan, meja, tanggal, status">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </form>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Meja</th>
                        <th>Tanggal</th>
                        <th>Jumlah Orang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservasis as $reservasi)
                        <tr>
                            <td>{{ $reservasi->id }}</td>
                            <td>{{ $reservasi->pelanggan->nama }}</td>
                            <td>{{ $reservasi->meja->nomor_meja }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->format('d M Y H:i') }}</td>
                            <td>{{ $reservasi->jumlah_orang }}</td>
                            <td>
                                <span{{ $reservasi->status == 'confirmed' ? 'success' : ($reservasi->status == 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($reservasi->status) }}</span>
                            </td>
                            <td>
                                <a href="{{ route('reservasi.edit', $reservasi->id) }}"
                                    class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('reservasi.destroy', $reservasi->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Hapus reservasi?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

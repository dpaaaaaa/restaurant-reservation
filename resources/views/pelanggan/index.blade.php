@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Title and Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-dark">Daftar Pelanggan</h1>
            <a href="{{ route('pelanggan.create') }}" class="btn btn-success">Tambah Pelanggan</a>
        </div>

        <!-- Table -->
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->id }}</td>
                        <td>{{ $pelanggan->nama }}</td>
                        <td>{{ $pelanggan->email }}</td>
                        <td>{{ $pelanggan->telepon }}</td>
                        <td>
                            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Hapus pelanggan?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

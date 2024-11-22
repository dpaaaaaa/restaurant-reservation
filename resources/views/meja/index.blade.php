@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-dark">Daftar Meja</h1>
            <a href="{{ route('meja.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>Tambah Meja</a>
        </div>

        <table class="table tble-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nomor Meja</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            @foreach ($mejas as $meja)
                <tr>
                    <td>{{ $meja->id }}</td>
                    <td>{{ $meja->nomor_meja }}</td>
                    <td>{{ $meja->kapasitas }}</td>
                    <td>{{ $meja->status ? 'Tersedia' : 'Terisi' }}</td>
                    <td>
                        <a href="{{ route('meja.edit', $meja->id) }}" class="btn btn-outline-success btn-sm">Edit</a>
                        <form action="{{ route('meja.destroy', $meja->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Hapus meja?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Pelanggan</h1>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        @foreach ($pelanggans as $pelanggan)
            <tr>
                <td>{{ $pelanggan->nama }}</td>
                <td>{{ $pelanggan->email }}</td>
                <td>{{ $pelanggan->telepon }}</td>
                <td>
                    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}">Edit</a>
                    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus pelanggan?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

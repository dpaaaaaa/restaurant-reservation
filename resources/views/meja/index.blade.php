@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Meja</h1>
        <a href="{{ route('meja.create') }}" class="btn btn-primary">Tambah Meja</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Nomor Meja</th>
            <th>Kapasitas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach ($mejas as $meja)
            <tr>
                <td>{{ $meja->nomor_meja }}</td>
                <td>{{ $meja->kapasitas }}</td>
                <td>{{ $meja->status ? 'Tersedia' : 'Terisi' }}</td>
                <td>
                    <a href="{{ route('meja.edit', $meja->id) }}">Edit</a>
                    <form action="{{ route('meja.destroy', $meja->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus meja?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

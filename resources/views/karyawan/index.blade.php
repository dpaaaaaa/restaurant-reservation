@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Daftar Karyawan</h1>
            <a href="{{ route('karyawan.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Karyawan
            </a>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawans as $karyawan)
                        <tr>
                            <td>{{ $karyawan->id }}</td>
                            <td>{{ $karyawan->nama }}</td>
                            <td>{{ $karyawan->jabatan }}</td>
                            <td>Rp {{ number_format($karyawan->gaji, 2, ',', '.') }}</td>
                            <td class="text-center">


                                <a href="{{ route('karyawan.edit', $karyawan->id) }}"
                                    class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Hapus karyawan?')">
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

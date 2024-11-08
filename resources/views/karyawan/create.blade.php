@extends('layouts.app')

@section('content')
    <h1>Tambah Karyawan</h1>
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" required>
            @error('jabatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="gaji">Gaji</label>
            <input type="number" name="gaji" id="gaji" value="{{ old('gaji') }}" required>
            @error('gaji')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Edit Karyawan</h1>
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ $karyawan->nama }}" required>

        <label for="jabatan">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" value="{{ $karyawan->jabatan }}" required>

        <label for="gaji">Gaji</label>
        <input type="number" name="gaji" id="gaji" value="{{ $karyawan->gaji }}" required>

        <button type="submit">Update</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
<h1>Tambah Pelanggan</h1>
<form action="{{ route('pelanggan.store') }}" method="POST">
    @csrf
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="telepon">Telepon</label>
    <input type="text" name="telepon" id="telepon" required>

    <button type="submit">Simpan</button>
</form>
@endsection

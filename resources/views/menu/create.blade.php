@extends('layouts.app')

@section('content')
    <h1>Tambah Menu</h1>
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <label for="nama_menu">Nama Menu</label>
        <input type="text" name="nama_menu" id="nama_menu" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi"></textarea>

        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" required step="0.01" min="0">

        <button type="submit">Simpan</button>
    </form>
@endsection

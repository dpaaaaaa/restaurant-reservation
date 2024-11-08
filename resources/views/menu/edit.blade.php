@extends('layouts.app')

@section('content')
    <h1>Edit Menu</h1>
    <form action="{{ route('menu.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama_menu">Nama Menu</label>
        <input type="text" name="nama_menu" id="nama_menu" value="{{ $menu->nama_menu }}" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi">{{ $menu->deskripsi }}</textarea>

        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" value="{{ $menu->harga }}" required step="0.01"
            min="0">

        <button type="submit">Update</button>
    </form>
@endsection

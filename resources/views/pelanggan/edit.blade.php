@extends('layouts.app')

@section('content')
    <h1>Edit Pelanggan</h1>
    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ $pelanggan->nama }}" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $pelanggan->email }}" required>

        <label for="telepon">Telepon</label>
        <input type="text" name="telepon" id="telepon" value="{{ $pelanggan->telepon }}" required>

        <button type="submit">Update</button>
    </form>
@endsection

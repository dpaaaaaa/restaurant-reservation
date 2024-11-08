@extends('layouts.app')

@section('content')
    <h1>Tambah Meja</h1>
    <form action="{{ route('meja.store') }}" method="POST">
        @csrf
        <label for="nomor_meja">Nomor Meja</label>
        <input type="text" name="nomor_meja" id="nomor_meja" required>

        <label for="kapasitas">Kapasitas</label>
        <input type="number" name="kapasitas" id="kapasitas" required>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="1">Tersedia</option>
            <option value="0">Terisi</option>
        </select>

        <button type="submit">Simpan</button>
    </form>
@endsection

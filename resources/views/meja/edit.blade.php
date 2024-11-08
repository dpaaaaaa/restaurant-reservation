@extends('layouts.app')

@section('content')
    <h1>Edit Meja</h1>
    <form action="{{ route('meja.update', $meja->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nomor_meja">Nomor Meja</label>
        <input type="text" name="nomor_meja" id="nomor_meja" value="{{ $meja->nomor_meja }}" required>

        <label for="kapasitas">Kapasitas</label>
        <input type="number" name="kapasitas" id="kapasitas" value="{{ $meja->kapasitas }}" required>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="1" {{ $meja->status ? 'selected' : '' }}>Tersedia</option>
            <option value="0" {{ !$meja->status ? 'selected' : '' }}>Terisi</option>
        </select>

        <button type="submit">Update</button>
    </form>
@endsection

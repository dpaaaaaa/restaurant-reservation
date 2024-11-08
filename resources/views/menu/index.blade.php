@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Menu</h1>
        <a href="{{ route('menu.create') }}" class="btn btn-primary">Tambah Menu</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nama Menu</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        @foreach ($menus as $menu)
            <tr>
                <td>{{ $menu->nama_menu }}</td>
                <td>{{ $menu->deskripsi }}</td>
                <td>{{ $menu->harga }}</td>
                <td>
                    <a href="{{ route('menu.edit', $menu->id) }}">Edit</a>
                    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus menu?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

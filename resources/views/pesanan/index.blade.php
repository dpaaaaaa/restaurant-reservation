@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="h3 mb-4 text-white btn bg-secondary">Daftar Pesanan</h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('pesanan.create') }}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/FFFFFF/add.png" alt="add"/>
                </span>
                <span class="text">Tambah Pesanan</span>
            </a>
            @if (session('succes'))
                <div class="alert alert-success mt-2">
                    {{ session('succes') }}
                </div>
            @endif
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pesanan ID</th>
                            <th>Pelanggan</th>
                            <th>Menu</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Pesanan ID</th>
                            <th>Pelanggan</th>
                            <th>Menu</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($pesanans as $pesanan)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><strong>{{ $pesanan->id }}</strong></td>
                            <td><strong>{{ $pesanan->pelanggan->nama }}</strong></td>
                            <td><strong>{{ $pesanan->menu->nama_menu }}</strong></td>
                            <td><strong>{{ $pesanan->jumlah }}</strong></td>
                            <td><strong style="color : green;">Rp {{ number_format($pesanan->total_harga, 2, ',', '.') }}</strong></td>
                            <td>
                                <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="btn btn-outline-success btn-sm">
                                    <img width="16" height="16" src="https://img.icons8.com/fluency-systems-regular/50/40C057/edit-user-female.png" alt="edit-user-female"/>
                                    Edit
                                </a>
                                <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus pesanan?')">
                                        <img width="16" height="16" src="https://img.icons8.com/small/16/FA5252/filled-trash.png" alt="filled-trash"/>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

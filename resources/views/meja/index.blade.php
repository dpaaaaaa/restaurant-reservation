@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="h3 mb-4 text-white btn bg-secondary">Daftar Meja</h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('meja.create') }}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/FFFFFF/add.png" alt="add"/>
                </span>
                <span class="text">Tambah Meja</span>
            </a>
            @if (session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Meja</th>
                            <th>Kapasitas</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nomor Meja</th>
                            <th>Kapasitas</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($mejas as $meja)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><strong>{{ $meja->nomor_meja }}</strong></td>
                            <td><strong>{{ $meja->kapasitas }}</strong></td>
                            <td><strong>{{ $meja->status ? 'Tersedia' : 'Terisi' }}</strong></td>
                            <td>
                                <span class="badge {{ $meja->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $meja->status ? 'Tersedia' : 'Terisi' }}
                                </span>
                                
                                <a href="{{ route('meja.edit', $meja->id) }}" class="btn btn-outline-success btn-sm">
                                    <img width="16" height="16" src="https://img.icons8.com/fluency-systems-regular/50/40C057/edit-user-female.png" alt="edit-user-female"/>
                                    Edit
                                </a>
                                <form action="{{ route('meja.destroy', $meja->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus meja?')">
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

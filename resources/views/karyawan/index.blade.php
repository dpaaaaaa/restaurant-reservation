@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="h3 mb-4 text-white btn bg-secondary">Daftar Karyawan</h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('karyawan.create') }}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                </span>
                <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/FFFFFF/add.png" alt="add"/>
                <span class="text">Tambah Karyawan</span>
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
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Gaji</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Gaji</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($karyawans as $karyawan)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><strong>{{ $karyawan->nama }}</strong></td>
                            <td><strong>{{ $karyawan->jabatan }}</strong></td>
                            <td><strong>Rp {{ number_format($karyawan->gaji, 2, ',', '.') }}</strong></td>
                            <td>
                                <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-outline-success btn-sm">
                                    <img width="16" height="16" src="https://img.icons8.com/fluency-systems-regular/50/40C057/edit-user-female.png" alt="edit-user-female"/>
                                    <i class="fas fa-user-edit"></i> Edit
                                </a>
                                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus karyawan?')">
                                        <img width="16" height="16" src="https://img.icons8.com/small/16/FA5252/filled-trash.png" alt="filled-trash"/>
                                        <i class="fas fa-trash-alt"></i> Delete
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

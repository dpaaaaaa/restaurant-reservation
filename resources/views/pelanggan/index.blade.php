@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h3 class="h3 mb-4 text-white btn bg-secondary shadow-hologram">Daftar Pelanggan</h3>
        <!-- DataTales Example -->
        <div class="card shadow-hologram mb-4">
            <div class="card-header py-3">
                <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/FFFFFF/add.png"
                            alt="add" />
                    </span>
                    <span class="text">Tambah Pelanggan</span>
                </a>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
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
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggans as $pelanggan)
                                <tr class="row-hover">
                                    <th scope="row">{{ $loop->iteration }}</th>

                                    <td><strong>{{ $pelanggan->nama }}</strong></td>
                                    <td><strong>{{ $pelanggan->email }}</strong></td>
                                    <td><strong>{{ $pelanggan->telepon }}</strong></td>
                                    <td>
                                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                                            class="btn btn-outline-success btn-sm">
                                            <img width="16" height="16"
                                                src="https://img.icons8.com/fluency-systems-regular/50/40C057/edit-user-female.png"
                                                alt="edit-user-female" />
                                            <i class="fas fa-user-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Hapus pelanggan?')">
                                                <img width="16" height="16"
                                                    src="https://img.icons8.com/small/16/FA5252/filled-trash.png"
                                                    alt="filled-trash" />
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

<style>
    body {
        background: linear-gradient(135deg, rgba(110, 142, 251, 0.8), rgba(98, 182, 183, 0.8));
        background-size: 400% 400%;
        animation: gradientAnimation 15s ease infinite;
    }

    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .shadow-hologram {
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1), 0 0 10px rgba(110, 142, 251, 0.5);
        transition: all 0.3s ease;
    }

    .shadow-hologram:hover {
        box-shadow: 0 6px 40px rgba(0, 0, 0, 0.15), 0 0 15px rgba(110, 142, 251, 0.7);
        transform: scale(1.02);
    }

    .row-hover {
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .row-hover:hover {
        background-color: rgba(110, 142, 251, 0.1);
        box-shadow: inset 0 0 10px rgba(110, 142, 251, 0.3);
    }
</style>

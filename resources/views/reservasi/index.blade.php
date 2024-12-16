@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h3 class="h3 mb-4 text-white btn bg-secondary shadow-hologram">Daftar Reservasi</h3>
        <!-- DataTales Example -->
        <div class="card shadow-hologram mb-4">
            <div class="card-header py-3">
                <a href="{{ route('reservasi.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/FFFFFF/add.png"
                            alt="add" />
                    </span>
                    <span class="text">Tambah Reservasi</span>
                </a>
                @if (session('succes'))
                    <div class="alert alert-success mt-2">
                        {{ session('succes') }}
                    </div>
                @endif
            </div>

            <div class="card-body">
                <!-- Search Form -->
                <form method="GET" action="{{ route('reservasi.index') }}" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control"
                            value="{{ request('search') }}"
                            placeholder="Cari berdasarkan nama pelanggan, meja, tanggal, status">
                        <button type="submit" class="btn btn-outline-primary">
                            <img width="20" height="20"
                                src="https://img.icons8.com/pastel-glyph/128/228BE6/search--v2.png" alt="search--v2" />
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Pelanggan</th>
                                <th>Meja</th>
                                <th>Tanggal</th>
                                <th>Jumlah Orang</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasis as $reservasi)
                                <tr class="row-hover">
                                    <td><strong>{{ $reservasi->id }}</strong></td>
                                    <td><strong>{{ $reservasi->pelanggan->nama }}</strong></td>
                                    <td><strong>{{ $reservasi->meja->nomor_meja }}</strong></td>
                                    <td><strong>{{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->format('d M Y H:i') }}</strong></td>
                                    <td><strong>{{ $reservasi->jumlah_orang }}</strong></td>
                                    <td>
                                        <span class="badge {{ $reservasi->status == 'confirmed' ? 'badge-success' : ($reservasi->status == 'pending' ? 'badge-warning' : 'badge-danger') }}">
                                            {{ ucfirst($reservasi->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('reservasi.edit', $reservasi->id) }}"
                                            class="btn btn-outline-success btn-sm d-flex align-items-center">
                                            <img width="16" height="16"
                                                src="https://img.icons8.com/fluency-systems-regular/50/40C057/edit-user-female.png"
                                                alt="edit-user-female" class="me-1" />
                                            Edit
                                        </a>
                                        <form action="{{ route('reservasi.destroy', $reservasi->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm d-flex align-items-center"
                                                onclick="return confirm('Hapus reservasi?')">
                                                <img width="16" height="16"
                                                    src="https://img.icons8.com/small/16/FA5252/filled-trash.png"
                                                    alt="filled-trash" class="me-1" />
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

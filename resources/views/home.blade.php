@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">{{ __('Dashboard') }}</h4>
                    </div>

                    <div class="card-body bg-light">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="text-center">
                            <h5 class="mb-3">Welcome to the Restaurant Management System!</h5>
                            <p class="text-muted">
                                Manage your restaurant effectively using this dashboard. Navigate to the sections below to access the available features.
                            </p>
                        </div>

                        <!-- Dashboard Features -->
                        <div class="row mt-4">
                            <div class="col-md-4 text-center">
                                <a href="{{ route('karyawan.index') }}" class="btn btn-outline-primary btn-block">
                                    <img src="https://img.icons8.com/ios-filled/50/4a90e2/men-age-group-5.png" alt="Karyawan Icon">
                                    <br>Karyawan
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{ route('menu.index') }}" class="btn btn-outline-success btn-block">
                                    <img src="https://img.icons8.com/ios/50/4a90e2/restaurant-menu.png" alt="Menu Icon">
                                    <br>Menu
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{ route('reservasi.index') }}" class="btn btn-outline-secondary btn-block">
                                    <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/4a90e2/external-reservation-food-flatart-icons-outline-flatarticons.png" alt="Reservasi Icon">
                                    <br>Reservasi
                                </a>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4 text-center">
                                <a href="{{ route('pesanan.index') }}" class="btn btn-outline-warning btn-block">
                                    <img src="https://img.icons8.com/external-nawicon-detailed-outline-nawicon/50/4a90e2/external-order-food-food-delivery-nawicon-detailed-outline-nawicon-2.png" alt="Pesanan Icon">
                                    <br>Pesanan
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{ route('meja.index') }}" class="btn btn-outline-danger btn-block">
                                    <img src="https://img.icons8.com/ios/50/4a90e2/restaurant-table.png" alt="Meja Icon">
                                    <br>Meja
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{ route('pembayaran.index') }}" class="btn btn-outline-dark btn-block">
                                    <img src="https://img.icons8.com/ios/50/4a90e2/card-in-use.png" alt="Pembayaran Icon">
                                    <br>Pembayaran
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center bg-primary text-white">
                        <small>&copy; 2024 Restaurant Management System</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

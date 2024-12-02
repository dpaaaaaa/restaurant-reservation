<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Restaurant Management') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <img width="50" height="50" src="https://img.icons8.com/wired/50/FFFFFF/restaurant.png"
                    alt="restaurant" />
                <div class="sidebar-brand-text mx-3">Restauran</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('karyawan.index') }}">
                    <img width="40" height="40"
                        src="https://img.icons8.com/ios-filled/50/FFFFFF/men-age-group-5.png" alt="men-age-group-5" />
                    <span>Karyawan</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('pelanggan.index') }}">
                    <img width="40" height="40"
                        src="https://img.icons8.com/glyph-neue/64/FFFFFF/gender-neutral-user.png"
                        alt="gender-neutral-user" />
                    <span>Pelanggan</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('menu.index') }}">
                    <img width="40" height="40" src="https://img.icons8.com/ios/50/FFFFFF/restaurant-menu.png"
                        alt="restaurant-menu" />
                    <span>Menu</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('pesanan.index') }}">
                    <img width="40" height="40"
                        src="https://img.icons8.com/external-nawicon-detailed-outline-nawicon/50/FFFFFF/external-order-food-food-delivery-nawicon-detailed-outline-nawicon-2.png"
                        alt="external-order-food-food-delivery-nawicon-detailed-outline-nawicon-2" />
                    <span>Pesanan</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('meja.index') }}">
                    <img width="40" height="40" src="https://img.icons8.com/ios/50/FFFFFF/restaurant-table.png"
                        alt="restaurant-table" />
                    <span>Meja</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('pembayaran.index') }}">
                    <img width="40" height="40" src="https://img.icons8.com/ios/50/FFFFFF/card-in-use.png"
                        alt="card-in-use" />
                    <span>Pembayaran</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('reservasi.index') }}">
                    <img width="40" height="40"
                        src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/FFFFFF/external-reservation-food-flatart-icons-outline-flatarticons.png"
                        alt="external-reservation-food-flatart-icons-outline-flatarticons" />
                    <span>Reservasi</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow mr-4">
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link text-black"
                                                href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link text-black"
                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        @yield('content')
                    </div>

                </div>
                <!-- /.container-fluid -->



            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('asset/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('asset/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('asset/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>

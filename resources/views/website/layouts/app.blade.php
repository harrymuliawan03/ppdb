<!DOCTYPE html>
<html lang="en">

<head>
    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/dashforge/assets/css/dashforge.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/dashforge/assets/css/dashforge.dashboard.css') }}">

    <!-- Font adding font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/layout.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <title>SMK - Multimedia Mandiri</title>


    @yield('styles')
    @yield('style')
    @yield('css')
</head>

<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-white w-100 d-flex justify-content-between sticky-top px-5">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo-smk.png') }}" alt="" style="width: 50px; height: 50px">
                SMK M3
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="d-none d-lg-flex justify-content-center">
                <ul class="navbar-nav" style="gap: 10px">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" style="font-weight: bold" href="/">Beranda <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('visi-misi') ? 'active' : '' }}">
                        <a class="nav-link" style="font-weight: bold" href="/visi-misi">Visi & Misi</a>
                    </li>
                    <li class="nav-item {{ Request::is('ppdb*') ? 'active' : '' }}">
                        <a class="nav-link" style="font-weight: bold" href="/ppdb">PPDB</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex d-lg-none collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('visi-misi') ? 'active' : '' }}">
                        <a class="nav-link" href="/visi-misi">Visi & Misi</a>
                    </li>
                    <li class="nav-item {{ Request::is('ppdb') ? 'active' : '' }}">
                        <a class="nav-link" href="/ppdb">PPDB</a>
                    </li>
                    @guest('prospective_students')
                        @if (Auth::guard('web')->check())
                            <li class="nav-item mt-2">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <button
                                    style="background-color: white; border: none; font-weight: 500; color: #362FD9; display: block; text-align: center"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    style="display: block; text-align: center">Keluar</button>
                            </li>
                        @else
                            <li class="nav-item mt-2">
                                <a class="nav-link" href="/login">Masuk</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link" href="/register">Daftar</a>
                            </li>
                        @endif
                    @endguest
                    @auth('prospective_students')
                        <li class="nav-item mt-2">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button style="background-color: white; border: none; font-weight: 500; color: #362FD9;"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                style="display: block; text-align: center">Keluar</button>
                        </li>
                    @endauth
                </ul>
            </div>

            @guest('prospective_students')
                @if (Auth::guard('web')->check())
                    <div class="d-none d-lg-flex align-items-center justify-content-center" style="gap: 20px">
                        <p class="m-0 px-2 py-1 username-ellipsis">
                            Hai, {{ Auth::guard('web')->user()->name }}
                        </p>
                        <div class="d-none d-lg-block">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button style="background-color: white; border: none; font-weight: 500; color: #362FD9;"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</button>
                        </div>
                    </div>
                @else
                    <div class="d-none d-lg-flex align-items-center">
                        <div class="button-contact d-none d-lg-block mr-3">
                            <a href="/login-student">Masuk</a>
                        </div>
                        <div class="d-none d-lg-block">
                            <a href="/register-student">Daftar</a>
                        </div>
                    </div>
                @endif
            @endguest

            @auth('prospective_students')
                <div class="d-none d-lg-flex align-items-center justify-content-center" style="gap: 20px">
                    <p class="m-0 px-2 py-1 username-ellipsis">
                        Hai, {{ Auth::guard('prospective_students')->user()->name }}
                    </p>
                    <div class="d-none d-lg-block">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <button style="background-color: white; border: none; font-weight: 500; color: #362FD9;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</button>
                    </div>
                </div>
            @endauth
        </nav>


        <div class="wrapper-content">
            @yield('contents')
        </div>

        <footer class="text-white text-lg-start" style="background-color: #362FD9">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase text-white">SMK M3</h5>
                        <p>
                            sekolah adalah tempat mencetak penerus bangsa yang berkualitas dan berprestasi di segala
                            bidang yang dapat bersaing di dunia internasional
                        </p>
                    </div>
                    <!--Grid column-->
                    <div class="col-lg-6 mb-4 mb-md-0">
                        <div class="row w-100" style="justify-content: flex-end; gap: 10px; align-items: center;">
                            <h5 class="text-uppercase mb-0 font-weight-bold">Our Social Media : </h5>
                            <ul class="list-unstyled d-flex flex-row justify-content-center align-items-center"
                                style="gap: 10px; margin: 0;">
                                <li>
                                    <a href="#!" class="text-white">
                                        <img src="{{ asset('images/icons/fb.png') }}" alt=""
                                            style="width: 25px; height: 25px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/portal_smkm3/profilecard/?igsh=N3hhNDZqMHV2cTQw"
                                        class="text-white">
                                        <img src="{{ asset('images/icons/ig.png') }}" alt=""
                                            style="width: 25px; height: 25px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">
                                        <img src="{{ asset('images/icons/x.png') }}" alt=""
                                            style="width: 25px; height: 25px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">
                                        <img src="{{ asset('images/icons/yt.png') }}" alt=""
                                            style="width: 25px; height: 25px;">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2); font-size: 12px;">
                © 2024 Copyright: SMK Multimedia Mandiri
            </div>
            <!-- Copyright -->
        </footer>
    </div>

    <script src="{{ asset('vendor/dashforge/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('scripts')
    @yield('script')
    @yield('js')
</body>

</html>

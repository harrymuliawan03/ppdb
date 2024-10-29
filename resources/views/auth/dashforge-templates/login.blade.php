<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    {{-- <link rel="manifest" href="site.webmanifest"> --}}

    <title>SMk - M3</title>

    <!-- vendor css -->
    <link href="{{ asset('vendor/dashforge/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/dashforge/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/dashforge/assets/css/dashforge.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/dashforge/assets/css/dashforge.auth.css') }}">

    <style>
        .df-settings {
            display: none;
        }

        .btn-outline-google {
            background-color: transparent;
            border-color: #dd4b39;
            color: #dd4b39;
        }

        .btn-outline-google:hover,
        .btn-outline-google:focus {
            background-color: #dd4b39;
            border-color: #dd4b39;
            color: #fff;
        }
    </style>
</head>

<body>

    <header class="navbar navbar-header navbar-header-fixed">
        {{-- <a href="#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a> --}}
        <div class="navbar-brand">
            <a href=" {{ url('/') }} " class="df-logo d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/logo-smk.png') }}" alt="Webcore" width="50" height="50">
                <h2 class='m-0'>SMK M3</h1>
            </a>
        </div>
    </header>

    <div class="content content-fixed content-auth">
        <div class="container">
            <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
                <div class="media-body align-items-center justify-content-center d-none d-lg-flex bg-dark">
                    <div class="wd-250 wd-xl-450 mg-y-30 pd-x-30">
                        <div class="signin-logo tx-28 tx-bold tx-white text-center"><span class="tx-normal">[</span>
                            Dasbor Admin
                            <span class="tx-normal">]</span>
                        </div>
                        {{-- <div class="tx-white mg-b-60">Sistem Manajemen Data Terintegrasi</div>

                        <h5 class="tx-white">Mengapa Dasbor Admin?</h5>
                        <p class="tx-white-6">Mendukung pengelolaan data, dokumentasi API Swagger, dan manajer file.</p>
                        <p class="tx-white-6 mg-b-60">Menghasilkan seluruh logika CRUD dan UI (datagrid) dengan dropdown
                            atau formulir terkait tambahan. Siap dibangun sesuai kebutuhan proyek backend web Anda.</p> --}}
                    </div>
                </div><!-- media-body -->
                <form class="sign-wrapper mg-lg-l-50 mg-xl-l-60" method="post" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <!-- <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60"> -->
                    <div class="wd-100p">
                        <h3 class="tx-color-01 mg-b-5">Sign In</h3>
                        <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>

                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control"
                                placeholder="yourname@yourmail.com">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0-f">Password</label>
                                {{-- <a href="{{ url('/password/reset') }}" class="tx-13">Forgot password?</a> --}}
                            </div>
                            <input type="password" name="password" class="form-control"
                                placeholder="Enter your password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <a href="{{ url('/login-student') }}" class="tx-13">Login Siswa</a>
                        <button class="btn btn-brand-02 btn-block mt-2">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div>
            <span>&copy; {{ date('Y') }} Webcore v1.1.0. </span>
            <span>Created by <a href="https://redtech.co.id">Redtech</a></span>
        </div>
        <div>
            <nav class="nav">
                {{-- <a href="javascript:void(0)" class="nav-link">Licenses</a>
          <a href="javascript:void(0)" class="nav-link">Change Log</a>
          <a href="javascript:void(0)" class="nav-link">Get Help</a> --}}
            </nav>
        </div>
    </footer>

    <script src="{{ asset('vendor/dashforge/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/assets/js/dashforge.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/js-cookie/js.cookie.js') }}"></script>
</body>

</html>

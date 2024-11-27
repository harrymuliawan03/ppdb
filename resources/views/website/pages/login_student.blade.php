<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    {{-- <link rel="manifest" href="site.webmanifest"> --}}

    <title>SMK - Multimedia Mandiri</title>

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
            <a href=" {{ url('/') }} " class="df-logo">
                <h1>SMK M3</h1>
            </a>
        </div>
    </header>

    <div class="content content-fixed content-auth">
        <div class="container">
            <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
                <div class="media-body align-items-center d-none d-lg-flex bg-dark">
                    <img src="{{ asset('images/login.jpg') }}" alt="login image" style="width: 100%; height: 100%;">
                </div><!-- media-body -->
                <form class="sign-wrapper mg-lg-l-50 mg-xl-l-60" method="post" action="{{ url('/login-student') }}">
                    {!! csrf_field() !!}
                    <!-- <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60"> -->
                    <div class="wd-100p">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h3 class="tx-color-01 mg-b-5">Login</h3>
                        <p class="tx-color-03 tx-16 mg-b-40">Jadilah bagian dari sekolah kami</p>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                            @if ($errors->has('email'))
                                <span class="help-block" style="color: #dd4b39">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0-f">Password</label>
                            </div>
                            <input type="password" name="password" class="form-control">
                            @if ($errors->has('password'))
                                <span class="help-block" style="color: #dd4b39">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <a href="{{ url('/register-student') }}" class="tx-13">Belum punya akun?</a>
                        <br />
                        <br />
                        <a href="{{ url('/login') }}" class="tx-13">Login dashboard</a>
                        <button class="btn btn-brand-02 btn-block mt-4">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ asset('vendor/dashforge/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/assets/js/dashforge.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/js-cookie/js.cookie.js') }}"></script>
</body>

</html>

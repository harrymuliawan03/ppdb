<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@redtech">
    <meta name="twitter:creator" content="@redtech">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Webcore">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="https://via.placeholder.com/1260x950?text=Webcore">

    <!-- Facebook -->
    <meta property="og:url" content="https://dandisy.github.io">
    <meta property="og:title" content="Webcore">
    <meta property="og:description" content="Webcore - Web Backend Generate">

    <meta property="og:image" content="https://via.placeholder.com/1260x950?text=Webcore">
    <meta property="og:image:secure_url" content="https://via.placeholder.com/1260x950?text=Webcore">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Webcore - Web Backend Generate">
    <meta name="author" content="Redtech">

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}"> --}}

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
        <a href="" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
        <div class="navbar-brand">
            <a href=" {{ url('/') }} " class="df-logo d-flex align-items-center">
                <!-- web<span>core</span> -->
                <img src="{{ asset('images/logo-smk.png') }}" alt="" style="width: 50px; height: 50px">
                <h1 class="m-0 p-0 ml-2">SMK M3</h1>
            </a>
        </div>
    </header><!-- navbar -->

    <div class="content content-fixed content-auth" style="background-color: #F7F7F7">
        <div class="container">
            <div class="media align-items-center justify-content-center ht-100p">
                <form class="mg-lg-r-50 mg-xl-r-60" method="post" action="{{ url('/ppdb/register') }}"
                    enctype="multipart/form-data">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('images/animation-1.jpeg') }}" alt=""
                            style="width: 250px; height:250px;" class="mb-2">
                        <h4 class="tx-color-01 font-weight-bold mg-b-0 mb-5 w-100">Pendaftaran Calon Siswa</h4>
                    </div>
                    {!! csrf_field() !!}
                    <!-- Other form fields -->
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="name" name="name" class="form-control"
                            value="{{ $prospective_student->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ $prospective_student->email }}" disabled>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="number" name="nisn" class="form-control"
                            value="{{ $prospective_student->nisn }}">
                        @error('nisn')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="birth_date" class="form-control"
                            value="{{ $prospective_student->birth_date->format('Y-m-d') }}">
                        @error('birth_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>No. HP</label>
                        <input type="number" name="phone_number" class="form-control"
                            value="{{ $prospective_student->phone_number }}">
                        @error('phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label for="gender">Jenis Kelamin</label>
                        <select name="gender" id="gender">
                            <option value="male" {{ $prospective_student->gender == 'male' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="female" {{ $prospective_student->gender == 'female' ? 'selected' : '' }}>
                                Perempuan</option>
                            <option value="other" {{ $prospective_student->gender == 'other' ? 'selected' : '' }}>
                                Lainnya</option>
                        </select>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                            <label class="mg-b-0-f">Alamat lengkap</label>
                        </div>
                        <textarea name="address" class="form-control">{{ $prospective_student->address }}</textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <label for="major">Jurusan</label>
                        <select name="major" id="major">
                            @foreach ($majors as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        @error('major')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Sekolah Asal</label>
                        <input type="text" name="old_school" class="form-control">
                        @error('old_school')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nilai Rata-rata Ijazah</label>
                        <input type="text" name="average_ijazah" class="form-control">
                        @error('average_ijazah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nilai Rata-rata Raport</label>
                        <input type="text" name="average_raport" class="form-control">
                        @error('average_raport')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- File Upload: Ijazah -->
                    <div class="form-group">
                        <label for="ijazah">Upload Ijazah (PDF, JPG, PNG)</label>
                        <input type="file" name="ijazah" class="form-control-file" accept=".pdf, .jpg, .png">
                        @error('ijazah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- File Upload: Raport -->
                    <div class="form-group">
                        <label for="raport">Upload Nilai Raport (PDF, JPG, PNG)</label>
                        <input type="file" name="raport" class="form-control-file" accept=".pdf, .jpg, .png">
                        @error('raport')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- File Upload: Birth Certificate -->
                    <div class="form-group">
                        <label for="birth_certificate">Upload Akta Kelahiran (PDF, JPG, PNG)</label>
                        <input type="file" name="birth_certificate" class="form-control-file"
                            accept=".pdf, .jpg, .png">
                        @error('birth_certificate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- File Upload: Student Photo -->
                    <div class="form-group">
                        <label for="student_photo">Upload Foto Siswa (JPG, PNG)</label>
                        <input type="file" name="student_photo" class="form-control-file" accept=".jpg, .png">
                        @error('student_photo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-brand-02 btn-block">Buat Akun</button>
                </form>

            </div><!-- media -->
        </div><!-- container -->
    </div><!-- content -->


    <script src="{{ asset('vendor/dashforge/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('vendor/dashforge/assets/js/dashforge.js') }}"></script>

    <!-- append theme customizer -->
    <script src="{{ asset('vendor/dashforge/lib/js-cookie/js.cookie.js') }}"></script>
    <!-- <script src="{{ asset('vendor/dashforge/assets/js/dashforge.settings.js') }}"></script> -->
</body>

</html>

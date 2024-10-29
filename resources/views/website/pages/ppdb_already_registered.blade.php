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
    <style>
        @media print {

            .btn,
            .alert {
                display: none;
            }
        }
    </style>

    <title>SMK - Multimedia Mandiri</title>


    @yield('styles')
    @yield('style')
    @yield('css')
</head>

<body>
    <div class="">

        <div class="wrapper-content">

            <div class="container my-2">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <h1>Pendaftaran Berhasil</h1>
                    <p class="alert alert-success">Cetak pendaftaran anda untuk digunakan saat daftar ulang
                    </p>
                    <p>No Pendaftaran Anda adalah
                        <strong>{{ $registration->no_registration }}</strong>.
                    </p>

                    <h3>Detail Pendaftaran Anda:</h3>
                    <ul class="list-group">
                        <li class="list-group-item">Nama Lengkap: {{ $registration->prospective_student->name }}</li>
                        <li class="list-group-item">NISN: {{ $registration->prospective_student->nisn }}</li>
                        <li class="list-group-item">Email: {{ $registration->prospective_student->email }}</li>
                        <li class="list-group-item">Tanggal Lahir: {{ $registration->prospective_student->birth_date }}
                        </li>
                        <li class="list-group-item">No. HP: {{ $registration->prospective_student->phone_number }}</li>
                        <li class="list-group-item">Jurusan : {{ $registration->major->nama_jurusan }}</li>
                    </ul>

                    <h3>Dokumen:</h3>
                    <ul class="list-group">
                        <li class="list-group-item">
                            Ijazah: <a href="{{ asset('storage/' . $registration->ijazah) }}" target="_blank">View
                                Ijazah</a>
                        </li>
                        <li class="list-group-item">
                            Raport: <a href="{{ asset('storage/' . $registration->raport) }}" target="_blank">View
                                Raport</a>
                        </li>
                        <li class="list-group-item">
                            Birth Certificate: <a href="{{ asset('storage/' . $registration->birth_certificate) }}"
                                target="_blank">View Birth Certificate</a>
                        </li>
                    </ul>

                    <button onclick="window.print()" class="btn btn-primary mt-3">Cetak Bukti Pendaftaran</button>
                    <a href="/ppdb/announcement" class="btn btn-primary mt-3">Lihat Pengumuman Pendaftaran</a>
                    <a href="/" class="btn btn-success mt-3">Kembali ke Beranda</a>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('vendor/dashforge/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/dashforge/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('scripts')
    @yield('script')
    @yield('js')
</body>

</html>

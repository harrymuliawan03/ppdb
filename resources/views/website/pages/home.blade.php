@extends('website.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('website/css/home.css') }}">
@endsection

@section('contents')
    <section id="home">
        <div id="banner" class="row">
            <div class="introduce col-12 col-lg-6 text-center text-lg-left">
                <h1>SMK <span>Multimedia Mandiri</span></h1>
                <p>sekolah adalah tempat mencetak penerus bangsa
                    yang berkualitas dan berprestasi di segala bidang
                    yang dapat bersaing di dunia internasional</p>
                <div class="row align-items-center" style="gap: 10px; margin: 0;">
                    <p style="margin: 0">We are in Socials Media : </p>
                    <ul class="list-unstyled bg-primary d-flex flex-row justify-content-center align-items-center p-2"
                        style="gap: 10px; margin: 0; border-radius: 10px;">
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

            {{-- Image --}}
            <div class="container-hero-image col-12 col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('images/banner-1.png') }}" alt="">
                    <div class="hero-quote-primary">
                        “ Belajar Itu Menyenangkan kuncinya jangan pernah menyerah oleh apapun itu ”
                    </div>
                    <div class="hero-quote-secondary">“ Jika Ingin Sukses Belajarlah bersabar “</div>
                </div>
            </div>
        </div>

        <div id="why-choose-our-school">
            <div class="d-flex flex-column justify-content-center align-items-center title">
                <h1>Kenapa Harus SMK <br /><span>Multimedia Mandiri?</span></h1>
                <p>Alasan kenapa harus memilih untuk bergabung dengan SMK Makassar.</p>
            </div>
            <div class="container-facilities">
                <div class="card-facility">
                    <img src="{{ asset('images/icons/computer.png') }}" alt="">
                    <h2>Fasilitas Lengkap</h2>
                    <p>Penunjang belajar dengan kualitas terbaik</p>
                </div>
                <div class="card-facility">
                    <img src="{{ asset('images/icons/bank.png') }}" alt="">
                    <h2>Lingkungan Nyaman</h2>
                    <p>Berada di lingkungan yang nyaman dan asri</p>
                </div>
                <div class="card-facility">
                    <img src="{{ asset('images/icons/team.png') }}" alt="">
                    <h2>Pengajar Kompeten</h2>
                    <p>Guru terbaik dengan pengalaman</p>
                </div>
                <div class="card-facility">
                    <img src="{{ asset('images/icons/team2.png') }}" alt="">
                    <h2>Kerja Sama Luas</h2>
                    <p>Dapat kesempatan kerja yang lebih terjamin</p>
                </div>
            </div>
        </div>

        <div id="major">
            <div class="d-flex flex-column justify-content-center align-items-center title">
                <h1>Jurusan di SMK <br /><span>Multimedia Mandiri?</span></h1>
                <p>Pilihan program keahlian di SMK Multimedia Mandiri.</p>
            </div>
            <div class="container-major-list">
                <div class="card-major">
                    <img src="{{ asset('images/icons/tkj.png') }}" alt="">
                    <h2>Teknik Komputer Dan Jaringan</h2>
                </div>
                {{-- <div class="card-major">
                    <img src="{{ asset('images/icons/perhotelan.png') }}" alt="">
                    <h2>Perhotelan</h2>
                </div>
                <div class="card-major">
                    <img src="{{ asset('images/icons/rpl.png') }}" alt="">
                    <h2>Rekayasa Perangkat Lunak</h2>
                </div>
                <div class="card-major">
                    <img src="{{ asset('images/icons/arsitek.png') }}" alt="">
                    <h2>Arsitektur</h2>
                </div>
                <div class="card-major">
                    <img src="{{ asset('images/icons/audio-video.png') }}" alt="">
                    <h2>Teknik Audio Video</h2>
                </div>
                <div class="card-major">
                    <img src="{{ asset('images/icons/thunder.png') }}" alt="">
                    <h2>Teknik Instalasi Tenaga Listrik</h2>
                </div>
                <div class="card-major">
                    <img src="{{ asset('images/icons/otomotif.png') }}" alt="">
                    <h2>Teknik Kendaraan Ringan / Otomotif</h2>
                </div>
                <div class="card-major">
                    <img src="{{ asset('images/icons/pengelasan.png') }}" alt="">
                    <h2>Teknik Pengelasan</h2>
                </div> --}}
            </div>
        </div>

        <div id="extracurricular">
            <div class="d-flex flex-column justify-content-center align-items-center title">
                <h1>Ekstrakurikuler di SMK <br /><span>Multimedia Mandiri?</span></h1>
                <p>Pilihan Ekstrakulikuler di SMK Makassar.</p>
            </div>
            <div class="container-extracurricular-list">
                <div class="card-extracurricular">
                    <img src="{{ asset('images/icons/pmk.png') }}" alt="">
                    <h2>Praja Muda Karana</h2>
                    <p>Pertama kali dibentuk team tahun 2002</p>
                </div>
                <div class="card-extracurricular">
                    <img src="{{ asset('images/icons/pmr.png') }}" alt="">
                    <h2>Palang Merah Remaja</h2>
                    <p>Pertama kali dibentuk team tahun 2003</p>
                </div>
                {{-- <div class="card-extracurricular">
                    <img src="{{ asset('images/icons/pecinta-alam.png') }}" alt="">
                    <h2>Pecinta Alam</h2>
                    <p>Pertama kali dibentuk team tahun 2008</p>
                </div> --}}
                <div class="card-extracurricular">
                    <img src="{{ asset('images/icons/badminton.png') }}" alt="" width="55" height="55">
                    <h2>Badminton</h2>
                    <p>Pertama kali dibentuk team tahun 2016</p>
                </div>
                <div class="card-extracurricular">
                    <img src="{{ asset('images/icons/futsal.png') }}" alt="" width="60" height="60">
                    <h2>Futsal</h2>
                    <p>Pertama kali dibentuk team tahun 2016</p>
                </div>
            </div>
        </div>
        </div>

        <div id="news">
            <div class="d-flex flex-column justify-content-center align-items-center title">
                <h1>Berita Terbaru Di SMK<br /><span>Multimedia Mandiri?</span></h1>
                <p>Berita Terbaru Tentang SMK Multimedia Mandiri</p>
            </div>
            <div class="container-news-list">
                <div class="card-news">
                    <img src="{{ asset('images/news/news-1.png') }}" alt="">
                    <div class="content-desc">
                        <p>13 December 2023 </p>
                        <h2>Pendaftaran SMK Multimedia Mandiri Telah Dibuka !</h2>
                        <p>By Admin SmkNs</p>
                        <p class="action">Baca Selengkapnya</p>
                    </div>
                </div>
                <div class="card-news">
                    <img src="{{ asset('images/news/news-2.png') }}" alt="">
                    <div class="content-desc">
                        <p>13 December 2023 </p>
                        <h2>Pendaftaran SMK Multimedia Mandiri Telah Dibuka !</h2>
                        <p>By Admin SmkNs</p>
                        <p class="action">Baca Selengkapnya</p>
                    </div>
                </div>
                <div class="card-news">
                    <img src="{{ asset('images/news/news-3.png') }}" alt="">
                    <div class="content-desc">
                        <p>13 December 2023 </p>
                        <h2>Pendaftaran SMK Multimedia Mandiri Telah Dibuka !</h2>
                        <p>By Admin SmkNs</p>
                        <p class="action">Baca Selengkapnya</p>
                    </div>
                </div>
                <div class="card-news">
                    <img src="{{ asset('images/news/news-4.png') }}" alt="">
                    <div class="content-desc">
                        <p>13 December 2023 </p>
                        <h2>Pendaftaran SMK Multimedia Mandiri Telah Dibuka !</h2>
                        <p>By Admin SmkNs</p>
                        <p class="action">Baca Selengkapnya</p>
                    </div>
                </div>
                <div class="card-news">
                    <img src="{{ asset('images/news/news-5.png') }}" alt="">
                    <div class="content-desc">
                        <p>13 December 2023 </p>
                        <h2>Pendaftaran SMK Multimedia Mandiri Telah Dibuka !</h2>
                        <p>By Admin SmkNs</p>
                        <p class="action">Baca Selengkapnya</p>
                    </div>
                </div>
                <div class="card-news">
                    <img src="{{ asset('images/news/news-6.png') }}" alt="">
                    <div class="content-desc">
                        <p>13 December 2023 </p>
                        <h2>Pendaftaran SMK Multimedia Mandiri Telah Dibuka !</h2>
                        <p>By Admin SmkNs</p>
                        <p class="action">Baca Selengkapnya</p>
                    </div>
                </div>
                <div class="card-news">
                    <img src="{{ asset('images/news/news-7.png') }}" alt="">
                    <div class="content-desc">
                        <p>13 December 2023 </p>
                        <h2>Pendaftaran SMK Multimedia Mandiri Telah Dibuka !</h2>
                        <p>By Admin SmkNs</p>
                        <p class="action">Baca Selengkapnya</p>
                    </div>
                </div>
                <div class="card-news">
                    <img src="{{ asset('images/news/news-8.png') }}" alt="">
                    <div class="content-desc">
                        <p>13 December 2023 </p>
                        <h2>Pendaftaran SMK Multimedia Mandiri Telah Dibuka !</h2>
                        <p>By Admin SmkNs</p>
                        <p class="action">Baca Selengkapnya</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="documentation-photo">
            <div class="d-flex flex-column justify-content-center align-items-center title">
                <h1>Foto Documentasi Kegiatan <br />SMK Multimedia Mandiri</h1>
            </div>
            <div class="container-documentation-photo-list">
                <div class="card-documentation-photo"
                    style="background-image: url({{ asset('images/documentation-photo/documentation-photo-1.png') }});">
                    <div class="content-desc">
                        <h2>Meja Karya Salah satu Siswa </h2>
                        <p>SMK Multimedia Mandiri</p>
                    </div>
                </div>
                <div class="card-documentation-photo"
                    style="background-image: url({{ asset('images/documentation-photo/documentation-photo-2.png') }});">
                    <div class="content-desc">
                        <h2>Kegiatan</h2>
                        <p>Kegiatan Kerja Kelompok</p>
                    </div>
                </div>
                <div class="card-documentation-photo"
                    style="background-image: url({{ asset('images/documentation-photo/documentation-photo-3.png') }});">
                    <div class="content-desc">
                        <h2>Perpustakaan</h2>
                        <p>Ruangan perpustakaan baru di SMK Multimedia Mandiri</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

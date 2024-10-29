@extends('website.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('website/css/visi_misi.css') }}">
@endsection

@section('contents')
    <section id="visi_misi" class="hero-section">
        <div class="container">
            <div class="section-content">
                <h1 class="section-title">Visi dan Misi</h1>
                <p class="section-subtitle">Mewujudkan generasi unggul melalui pendidikan berkualitas</p>

                <div class="visi">
                    <h2 class="section-heading">Visi</h2>
                    <p class="section-text">
                        Mewujudkan lulusan SMK Multimedia Mandiri yang berbudi luhur, professional dan kreatif serta mampu
                        bersaing secara global dengan landaskan penguasaan dan implementasi IMTAQ dan IMTEK.
                    </p>
                </div>

                <div class="misi">
                    <h2 class="section-heading">Misi</h2>
                    <p class="section-text">
                        Menyelenggarakan pendidikan secara proud, professional dan creative serta selalu berupaya
                        meningkatkan pelayanan dan kepuasan stake holder .
                    </p>
                    <p class="section-text">
                        Untuk mewujudkan misi yang telah dirumuskan maka langkah-langkah nyata yang harus dilakukan oleh
                        sekolah adalah :
                    </p>
                    <ul class="section-text">
                        <li>Meningkatkan proses kegiatan mengajar yang kondusif.</li>
                        <li>Melaksanakan peningkatan mutu manajemen berbasis sekolah.</li>
                        <li>Meningkatkan pengembangan sumber daya pendidik melalui pelatihan-pelatihan baik yang
                            dilaksanakan secara internal maupun oleh instansi terkait. </li>
                        <li>Mengembangan jenjang kerjasama dengan Industri dan Dunia Kerja (IDUKA).</li>
                        <li>Meningkatkan pendidikan Akhlak peserta didik melalui program keagamaan</li>
                        <li>Menerapakan konsep sekolah aman, bersih, asri, indah dan terbebas dari penyalahgunaan
                            obat-obatan terlarang dan tawuran antar pelajar.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

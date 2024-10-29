@extends('website.layouts.app')

@section('contents')
    <div class="container mt-5">
        <div class="alert alert-info text-center">
            <h4>Pengumuman Pendaftaran Belum Ada</h4>
            <p>
                Saat ini, pengumuman pendaftaran belum tersedia. Silakan cek secara berkala untuk mendapatkan informasi
                terbaru mengenai pendaftaran.
            </p>
            <button class="btn btn-primary" onclick="goBack()">Kembali</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection

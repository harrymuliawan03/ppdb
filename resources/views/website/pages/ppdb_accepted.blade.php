@extends('website.layouts.app')

@section('contents')
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <h4>Selamat!</h4>
            <p>
                Anda telah diterima. Silahkan lakukan daftar ulang di SMK M3 untuk menjalasi proses lebih lanjut dengan
                membawa bukti pendaftaran
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

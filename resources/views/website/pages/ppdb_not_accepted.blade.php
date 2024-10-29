@extends('website.layouts.app')

@section('contents')
    <div class="container mt-5">
        <div class="alert alert-danger text-center">
            <h4>Maaf</h4>
            <p>
                Anda belum diterima pada pendaftaran kali ini. Silakan mencoba lagi di pendaftaran berikutnya.
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

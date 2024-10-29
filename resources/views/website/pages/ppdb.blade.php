@extends('website.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('website/css/ppdb.css') }}">
@endsection

@section('contents')
    <section id="ppdb" class="hero-section">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <img src="{{ asset('images/alur-ppdb.png') }}" alt="" style="width: 100%; height: 100%;">
            @auth('prospective_students')
                <a href="/ppdb/register" class="btn-primary"
                    style="display: block;
    margin: 0 auto 20px auto;
    width: 200px;
    text-align: center;
    border-radius: 11px;
    padding: 10px 20px;">Daftar
                    Sekarang</a>
            @endauth
            @guest('prospective_students')
                <a href="/register-student" class="btn-primary"
                    style="display: block;
    margin: 0 auto 20px auto;
    width: 250px;
    text-align: center;
    border-radius: 11px;
    padding: 10px 20px;">Daftar
                    Akun Calon Siswa</a>
            @endauth
        </div>
    </section>
@endsection

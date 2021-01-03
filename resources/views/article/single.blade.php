@extends('layout/main')
@section('judulHalaman', 'Halaman Artikel')
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mt-3"><b>Baca Artikel</b></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <h2>{{ $article->title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <p>{{ $article->subject }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <a href="/articles" class="btn btn-sm btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@extends('layout/main')
@section('judulHalaman', 'Halaman Artikel')
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mt-3"><b>Halaman Artikel</b></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/articles/create" class="btn btn-success">Buat Artikel Baru</a>
            </div>
            <div class="col-lg-8">
                <form action="/articles" method="get">
                <div class="input-group mb-3">
                    <input type="text" id="cari" name="cari" class="form-control" placeholder="Masukkan kata kunci...">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </div>
            </form>
            </div>
        </div>

        <div class="row">
            @foreach ($articles as $article)
            <div class="col-md-4">
                <div class="card mt-2" style="width: 23rem; height: 14rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="/image/{{ $article->thumbnail }}" class="rounded" width="95px">
                            </div>
                            <div class="col-sm">
                                <h5 class="card-title"><b>{{ $article->title }}</b></h5>
                                <p class="card-text">Kategori : {{ $article->kategori }}
                                    <br>Penulis : {{ $article->penulis }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                        <a href="/articles/{{ $article->id }}" class="btn btn-info btn-sm">Baca Lengkap</a>
                        <a href="/articles/{{ $article->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/articles/{{ $article->id }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                        </div>
                    </div>
                  </div>
                </div>
                @endforeach
        </div>
        <div class="row mt-3">
            <div class="col">
                {{ $articles->links() }}
            </div>
        </div>
    </div>

@endsection

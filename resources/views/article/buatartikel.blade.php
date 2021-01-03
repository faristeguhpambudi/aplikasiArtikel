@extends('layout/main')
@section('judulHalaman', 'Halaman Artikel')
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mt-3"><b>Buat Artikel Baru</b></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <form action="/articles/" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                      <label for="title">Judul</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukkan Judul.." value="{{ old('title') }}">
                      @error('title')
                            <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" placeholder="Masukkan Kategori.." value="{{ old('kategori') }}">
                        @error('kategori')
                              <div class="small text-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" placeholder="Masukkan penulis.." value="{{ old('penulis') }}">
                        @error('penulis')
                              <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">Isi Artikel</label>
                        <textarea class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" rows="5" placeholder="Masukkan Isi Artkel...">{{ old('subject') }}</textarea>
                        @error('subject')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penulis">Thumbnail</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Artikel!</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layout/main')
@section('judulHalaman', 'Halaman Artikel')
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mt-3"><b>Edit Artikel</b></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <form action="/articles/{{$article->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label for="title">Judul</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukkan Judul.." value="{{ $article->title }}">
                      @error('title')
                            <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" placeholder="Masukkan Kategori.." value="{{ $article->kategori }}">
                        @error('kategori')
                              <div class="small text-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" placeholder="Masukkan penulis.." value="{{ $article->penulis }}">
                        @error('penulis')
                              <div class="small text-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">Isi Artikel</label>
                        <textarea class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" rows="5" placeholder="Masukkan Isi Artkel...">{{ $article->subject }}</textarea>
                        @error('subject')
                            <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penulis">Thumbnail</label>
                        <div class="custom-file">
                            <div class="row">
                            <div class="col-sm-3">
                                <img src="/image/{{ $article->thumbnail }}" alt="..." class="img-thumbnail" width="150px">
                            </div>
                            <div class="col-sm-4">
                                <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" value="{{ $article->thumbnail }}">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <br><br><br>
                                <button type="submit" class="btn btn-primary">Update Artikel!</button>
                            </div>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection

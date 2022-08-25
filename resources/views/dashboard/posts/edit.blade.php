@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Edit <span class="text-bold">{{ $post->judul }}</span></h2>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Title</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul', $post->judul) }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Post Image</label>
                <input type="hidden" name="oldImage" value="{{ $post->foto }}">
                <img src="{{ asset('storage/' . $post->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewImage()">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $post->deskripsi) }}">
                <trix-editor input="deskripsi"></trix-editor>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/dashboard/posts" class="btn btn-danger">Batal</a>
        </form>
    </div>
</div>
@endsection
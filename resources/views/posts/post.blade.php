@extends('layouts.main')

@section('container')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3 fw-bold text-center text-uppercase">{{ $post->judul }}</h1>

                
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->foto) }}" alt="{{ $post->judul }}" width="100%">
                </div>
                <small class="text-muted">Oleh <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>. {{ $post->created_at->diffForHumans() }}</small>

                <article class="my-3 fs-5">
                    {!! $post->deskripsi !!}
                </article>

                <a href="/posts" class="btn btn-danger btn-sm mt-2">Kembali</a>

            </div>
        </div>
    </div>

@endsection

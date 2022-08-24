@extends('layouts.main')

@section('container')
<div class="container">
    <h2 class="my-3 text-center text-bold">{{ $title }}</h2>
        <div class="m-auto col-md-6 mb-5">
                <form action="/posts">
                    @if(request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>
                </form>
            </div>
    
        @if($posts->count())
            <div class="card mb-3">
                <div style="max-height: 400px; overflow:hidden;">
                    <img width="100%" style="" src="{{ asset('storage/' . $posts[0]->foto) }}" alt="{{ $posts[0]->judul }}">
                </div>
    
                <div class="card-body text-center">
                    <h3 class="card-title">
                        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->judul }}</a>
                    </h3>
                    <p>
                        <small class="text-muted">
                            Oleh <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a>. {{ $posts[0]->created_at->diffForHumans() }}
                        </small> 
                    </p>
                    <article class="card-text mb-3">{!! Str::limit($posts[0]->body, 200) !!}</article>
    
                    <p>
                        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
                    </p>
                </div>
            </div>
            
        <div class="container">
            <div class="row">
                @foreach($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute text-white px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7);">
                        </div>
                        <img src="{{ asset('storage/' . $post->foto) }}" alt="{{ $post->judul }}" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->judul }}</h5>
                            <p>
                                <small class="text-muted">
                                    By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>{{ $post->created_at->diffForHumans() }}
                                </small> 
                            </p>
                            <p class="card-text">{!! Str::limit($posts[0]->body, 200) !!}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    
        @else
            <p class="text-center fs-4 text-bold m-5">No post found.</p>
        @endif
    
        <div class="d-flex justify-content-end">
            {{ $posts->links() }}
        </div>
</div>

@endsection

@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="pt-3 mb-3 border-bottom">
        <div class="row">
            <div class="col-md-4 lh-1">
                <h2>Dokumentasi</h2>
                <p class="text-muted">Halo, {{ auth()->user()->name }}</p>
            </div>
            <div class="col-md-6">
                @if(session()->has('success'))
                    <div class="alert alert-success col-lg-8" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="col-md-2 text-end">
                <a href="/dashboard/posts/create" class="btn btn-primary mb-3 shadow-sm"><i class="bi bi-plus-circle"></i></a>
            </div>
        </div>
    </div>
    
    
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img class="img-fluid rounded-3" style="max-width: 100px;" src="{{ asset('storage/' . $post->foto) }}" alt="{{ $post->judul }}">
                                    </td>
                                    <td>{{ $post->judul}}</td>
                                    <td>{{ Str::words(strip_tags($post->deskripsi), 10) }}</td>
                                    <td>
                                        <div class="text-center" style="white-space: nowrap;">
                                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-primary shadow-sm">Edit</a>
                                            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah yakin ingin menghapus {{ $post->judul }}?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
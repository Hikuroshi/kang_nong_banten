@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Dokumentasi</h2>
    </div>
    
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-6">
                                <a href="/dashboard/posts/create" class="btn btn-primary mb-3 shadow-sm">Tambah Postingan</a>
                                <a href="/register" class="btn btn-warning mb-3 shadow-sm">Tambah Admin</a>
                            </div>
                            <div class="col-md-6">
                                @if (session()->has('success'))
                                <div class="alert alert-success col-lg-8 ms-auto">
                                    {{ session('success') }}
                                </div>
                                @endif
                            </div>
                        </div>
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
                                    <td>{!! Str::limit($post->body, 200) !!}</td>
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
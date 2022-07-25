@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6 m-auto">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        @if ($pesertas->count())
            @foreach ($pesertas as $peserta)
                <div class="col-md-6">
                    <div class="card border mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $peserta->foto) }}" class="img-fluid rounded-start" alt="{{ $peserta->nama_peserta }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $peserta->nama_peserta }}</h5>
                                    <p class="card-text m-0">Wilayah: {{ $peserta->wilayah->nama_wilayah }}</p>
                                    <p class="card-text m-0">No Telp: {{ $peserta->telepon }}</p>
                                    <p class="card-text m-0">Keterangan: {{ $peserta->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h4 class="d-flex justify-content-center fw-bold" style="margin: 20vh 0 20vh 0;">Peserta tidak ditemukan</h4>
        @endif
    </div>
</div>
@endsection
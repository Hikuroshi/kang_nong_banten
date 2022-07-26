@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8 m-auto">
                <div class="card p-3">
                    <h3 class="text-center fw-bold">Tambah Peserta</h3>
                    <form action="/dashboard/pesertas" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_peserta" class="form-label">Nama Peserta:</label>
                            <input type="text" class="form-control @error('nama_peserta') is-invalid @enderror" id="nama_peserta" name="nama_peserta" required autofocus value="{{ old('nama_peserta') }}">
                            @error('nama_peserta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori:</label>
                            <div class="row">
                                @foreach ($kategoris as $kategori)
                                    <div class="col-3">
                                        <div class="form-check text-center">
                                            <input class="form-check-input" type="radio" id="{{ $kategori->nama_kategori }}" name="kategori_id" required {{ old('kategori_id') == $kategori->id ? "checked='checked'" : '' }} value="{{ $kategori->id }}">
                                            <label class="form-check-label" for="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="wilayah" class="form-label">Wilayah:</label>
                            <select id="wilayah" class="form-select" name="wilayah_id" required>
                                <option></option>
                                @foreach ($wilayahs as $wilayah)
                                    @if (old('wilayah_id') == $wilayah->id)
                                        <option value="{{ $wilayah->id }}" selected>{{ $wilayah->nama_wilayah }}</option>
                                    @else
                                        <option value="{{ $wilayah->id }}">{{ $wilayah->nama_wilayah }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="angkatan" class="form-label">Tahun Angkatan:</label>
                            <input min="2000" max="2100" type="number" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan" required value="{{ old('angkatan') }}">
                            @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon:</label>
                            <input type="number" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" required value="{{ old('telepon') }}">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan:</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Peserta:</label>
                            <input type="file" accept="image/*" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" required value="{{ old('foto') }}">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                        <a href="/dashboard/pesertas" class="btn btn-danger shadow-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
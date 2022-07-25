@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card p-3">
                    <h3 class="text-center fw-bold">Edit Peserta {{ $peserta->nama_peserta }}</h3>
                    <form action="/dashboard/pesertas/{{ $peserta->slug }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="mb-3">
                            <label for="nama_peserta" class="form-label">Nama Peserta:</label>
                            <input type="text" class="form-control @error('nama_peserta') is-invalid @enderror" id="nama_peserta" name="nama_peserta" required autofocus value="{{ old('nama_peserta', $peserta->nama_peserta) }}">
                            @error('nama_peserta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="wilayah" class="form-label">Wilayah:</label>
                            <select class="form-select" name="wilayah_id">
                                @foreach ($wilayahs as $wilayah)
                                    @if (old('wilayah_id', $peserta->wilayah_id) == $wilayah->id)
                                        <option value="{{ $wilayah->id }}" selected>{{ $wilayah->nama_wilayah }}</option>
                                    @else
                                        <option value="{{ $wilayah->id }}">{{ $wilayah->nama_wilayah }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon:</label>
                            <input type="number" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" required value="{{ old('telepon', $peserta->telepon) }}">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan:</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan', $peserta->keterangan) }}">
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Peserta:</label>
                            <input type="hidden" name="oldImage" value="{{ $peserta->foto }}">
                            <input type="file" accept="image/*" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="/dashboard/pesertas">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
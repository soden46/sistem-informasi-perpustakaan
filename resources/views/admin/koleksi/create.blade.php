@extends('layouts.app', [
    'title' => 'Tambah Koleksi',
    'pageTitle' => 'Tambah Koleksi',
])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Koleksi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.koleksi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">Kategori</label>
                        <select id="id_kategori" name="id_kategori"
                            class="form-select @error('id_kategori') is-invalid @enderror" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" id="judul_buku"
                            name="judul_buku" value="{{ old('judul_buku') }}" required>
                        @error('judul_buku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang"
                            name="pengarang" value="{{ old('pengarang') }}" required>
                        @error('pengarang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit"
                            name="penerbit" value="{{ old('penerbit') }}" required>
                        @error('penerbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="date" class="form-control @error('tahun_terbit') is-invalid @enderror"
                            id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                        @error('tahun_terbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn"
                            name="isbn" value="{{ old('isbn') }}" required>
                        @error('isbn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rekomendasi" class="form-label">Rekomendasi</label>
                        <select id="rekomendasi" name="rekomendasi"
                            class="form-select @error('rekomendasi') is-invalid @enderror" required>
                            <option value="">Pilih Rekomendasi</option>
                            <option value="Ya" {{ old('rekomendasi') == 'Ya' ? 'selected' : '' }}>Ya</option>
                            <option value="Tidak" {{ old('rekomendasi') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        </select>
                        @error('rekomendasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.koleksi.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@stop

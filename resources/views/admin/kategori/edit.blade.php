@extends('layouts.app', [
    'title' => 'Edit Kategori',
    'pageTitle' => 'Edit Kategori',
])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Edit Kategori</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.kategori.update', $kategori->id_kategori) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                            id="nama_kategori" name="nama_kategori"
                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                        @error('nama_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi"
                            value="{{ old('deskripsi', $kategori->deskripsi) }}">
                        <trix-editor input="deskripsi"
                            class="form-control @error('deskripsi') is-invalid @enderror"></trix-editor>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@stop

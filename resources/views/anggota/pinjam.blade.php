@extends('layouts.app', [
    'title' => 'Ajukan Peminjaman Buku',
    'pageTitle' => 'Ajukan Peminjaman Buku',
])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Ajukan Peminjaman Buku</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('anggota.koleksi.buku.pinjam', ['id_buku' => $buku->id_buku]) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="id_buku">Pilih Buku</label>
                        <select id="id_buku" name="id_buku" class="form-control" required>
                            @foreach ($allBooks as $book)
                                <option value="{{ $book->id_buku }}"
                                    {{ $book->id_buku == $buku->id_buku ? 'selected' : '' }}>
                                    {{ $book->judul_buku }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="tgl_pinjam"
                            name="tgl_pinjam" value="{{ old('tgl_pinjam') }}" required>
                        @error('tgl_pinjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror"
                            id="tgl_kembali" name="tgl_kembali" value="{{ old('tgl_kembali') }}" required>
                        @error('tgl_kembali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('anggota.koleksi') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@stop

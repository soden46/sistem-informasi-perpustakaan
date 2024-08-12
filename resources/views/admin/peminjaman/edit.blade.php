@extends('layouts.app', [
    'title' => 'Edit Peminjaman Buku',
    'pageTitle' => 'Edit Peminjaman Buku',
])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Edit Peminjaman Buku</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.peminjaman.update', $peminjaman->id_peminjaman) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="id_anggota" class="form-label">Anggota</label>
                        <select id="id_anggota" name="id_anggota"
                            class="form-select @error('id_anggota') is-invalid @enderror" required>
                            <option value="">Pilih Anggota</option>
                            @foreach ($anggota as $item)
                                <option value="{{ $item->id_anggota }}"
                                    {{ $peminjaman->id_anggota == $item->id_anggota ? 'selected' : '' }}>
                                    {{ $item->nama_anggota }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_anggota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_buku" class="form-label">Buku</label>
                        <select id="id_buku" name="id_buku" class="form-select @error('id_buku') is-invalid @enderror"
                            required>
                            <option value="">Pilih Buku</option>
                            @foreach ($buku as $item)
                                <option value="{{ $item->id_buku }}"
                                    {{ $peminjaman->id_buku == $item->id_buku ? 'selected' : '' }}>
                                    {{ $item->judul_buku }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_buku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="tgl_pinjam"
                            name="tgl_pinjam" value="{{ old('tgl_pinjam', $peminjaman->tgl_pinjam) }}" required>
                        @error('tgl_pinjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror"
                            id="tgl_kembali" name="tgl_kembali" value="{{ old('tgl_kembali', $peminjaman->tgl_kembali) }}"
                            required>
                        @error('tgl_kembali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_denda" class="form-label">Jumlah Denda</label>
                        <input type="number" class="form-control @error('jumlah_denda') is-invalid @enderror"
                            id="jumlah_denda" name="jumlah_denda"
                            value="{{ old('jumlah_denda', $peminjaman->jumlah_denda) }}" step="0.01">
                        @error('jumlah_denda')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.peminjaman.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@stop

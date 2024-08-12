@extends('layouts.app', [
    'title' => 'Edit Pengembalian',
    'pageTitle' => 'Edit Pengembalian Buku',
])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Edit Pengembalian Buku</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pengembalian.update', $pengembalian->id_kembali) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_anggota" class="form-label">Anggota</label>
                        <select class="form-control @error('id_anggota') is-invalid @enderror" id="id_anggota"
                            name="id_anggota" required>
                            @foreach ($anggotaOptions as $anggota)
                                <option value="{{ $anggota->id_anggota }}"
                                    {{ $anggota->id_anggota == $pengembalian->id_anggota ? 'selected' : '' }}>
                                    {{ $anggota->nama_anggota }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_anggota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_buku" class="form-label">Buku</label>
                        <select class="form-control @error('id_buku') is-invalid @enderror" id="id_buku" name="id_buku"
                            required>
                            @foreach ($bukuOptions as $buku)
                                <option value="{{ $buku->id_buku }}"
                                    {{ $buku->id_buku == $pengembalian->id_buku ? 'selected' : '' }}>
                                    {{ $buku->judul_buku }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_buku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_peminjaman" class="form-label">Tanggal Peminjaman</label>
                        <select class="form-control @error('id_peminjaman') is-invalid @enderror" id="id_peminjaman"
                            name="id_peminjaman" required>
                            @foreach ($peminjamanOptions as $peminjaman)
                                <option value="{{ $peminjaman->id_peminjaman }}"
                                    {{ old('id_peminjaman', $pengembalian->id_peminjaman) == $peminjaman->id_peminjaman ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('m/d/Y') }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_peminjaman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror"
                            id="tgl_kembali" name="tgl_kembali"
                            value="{{ old('tgl_kembali', $pengembalian->tgl_kembali) }}" required>
                        @error('tgl_kembali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_denda" class="form-label">Jumlah Denda</label>
                        <input type="number" class="form-control @error('jumlah_denda') is-invalid @enderror"
                            id="jumlah_denda" name="jumlah_denda"
                            value="{{ old('jumlah_denda', $pengembalian->jumlah_denda) }}" required>
                        @error('jumlah_denda')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.pengembalian.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@stop

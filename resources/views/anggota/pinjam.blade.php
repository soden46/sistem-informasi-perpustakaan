@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pinjam Buku') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('anggota.storePeminjaman') }}">
                            @csrf

                            <div class="form-group">
                                <label for="id_buku">{{ __('Pilih Buku') }}</label>
                                <select id="id_buku" name="id_buku"
                                    class="form-control @error('id_buku') is-invalid @enderror" required>
                                    <option value="">-- Pilih Buku --</option>
                                    @foreach ($koleksi as $buku)
                                        <option value="{{ $buku->id_buku }}">{{ $buku->judul_buku }} -
                                            {{ $buku->pengarang }}</option>
                                    @endforeach
                                </select>
                                @error('id_buku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tgl_pinjam">{{ __('Tanggal Pinjam') }}</label>
                                <input id="tgl_pinjam" type="date"
                                    class="form-control @error('tgl_pinjam') is-invalid @enderror" name="tgl_pinjam"
                                    value="{{ old('tgl_pinjam') }}" required>
                                @error('tgl_pinjam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tgl_kembali">{{ __('Tanggal Kembali') }}</label>
                                <input id="tgl_kembali" type="date"
                                    class="form-control @error('tgl_kembali') is-invalid @enderror" name="tgl_kembali"
                                    value="{{ old('tgl_kembali') }}" required>
                                @error('tgl_kembali')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Pinjam Buku') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

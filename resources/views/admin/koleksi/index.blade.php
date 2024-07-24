@extends('layouts.app', [
    'title' => 'Koleksi',
    'pageTitle' => 'Daftar Koleksi',
])

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <a href="{{ route('admin.koleksi.create') }}" class="btn btn-primary">Tambah Koleksi</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Daftar Koleksi</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kategori</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>ISBN</th>
                            <th>Rekomendasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($koleksis as $koleksi)
                            <tr>
                                <td>{{ $koleksi->id_buku }}</td>
                                <td>{{ $koleksi->kategori->nama_kategori ?? 'Tidak Memiliki Kategori' }}</td>
                                <td>{{ $koleksi->judul_buku }}</td>
                                <td>{{ $koleksi->pengarang }}</td>
                                <td>{{ $koleksi->penerbit }}</td>
                                <td>{{ $koleksi->tahun_terbit->format('d-m-Y') }}</td>
                                <td>{{ $koleksi->isbn }}</td>
                                <td>{{ $koleksi->rekomendasi }}</td>
                                <td>
                                    <a href="{{ route('admin.koleksi.edit', $koleksi->id_buku) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <!-- Add delete functionality if needed -->
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada koleksi tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
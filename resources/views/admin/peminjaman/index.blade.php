@extends('layouts.app', [
    'title' => 'Peminjaman Buku',
    'pageTitle' => 'Daftar Peminjaman Buku',
])

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row mb-4">
            <div class="col-md-12">
                <a href="{{ route('admin.peminjaman.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Daftar Peminjaman Buku</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Peminjaman</th>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Denda</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjamans as $peminjaman)
                            <tr>
                                <td>{{ $peminjaman->id_peminjaman }}</td>
                                <td>{{ $peminjaman->anggota->nama ?? 'Tidak Diketahui' }}</td>
                                <td>{{ $peminjaman->buku->judul ?? 'Tidak Diketahui' }}</td>
                                <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d-m-Y') }}</td>
                                <td>{{ $peminjaman->jumlah_denda ?? 'Tidak Memiliki Denda' }}</td>
                                <td>
                                    <form action="{{ route('admin.peminjaman.destroy', $peminjaman->id_peminjaman) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.peminjaman.edit', $peminjaman->id_peminjaman) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada peminjaman buku tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-3">
                    {{ $peminjamans->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

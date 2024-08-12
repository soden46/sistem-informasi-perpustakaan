@extends('layouts.app', [
    'title' => 'Pengembalian Buku',
    'pageTitle' => 'Daftar Pengembalian Buku',
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
                <a href="{{ route('admin.pengembalian.create') }}" class="btn btn-primary">Tambah Pengembalian</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Daftar Pengembalian Buku</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kembali</th>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tanggal Kembali</th>
                            <th>Denda</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengembalians as $pengembalian)
                            <tr>
                                <td>{{ $pengembalian->id_kembali }}</td>
                                <td>{{ $pengembalian->anggota->nama ?? 'Tidak Diketahui' }}</td>
                                <td>{{ $pengembalian->buku->judul ?? 'Tidak Diketahui' }}</td>
                                <td>{{ \Carbon\Carbon::parse($pengembalian->tgl_kembali)->format('d-m-Y') }}</td>
                                <td>{{ $pengembalian->jumlah_denda }}</td>
                                <td>
                                    <form action="{{ route('admin.pengembalian.destroy', $pengembalian->id_kembali) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.pengembalian.edit', $pengembalian->id_kembali) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada pengembalian buku tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

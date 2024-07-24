@extends('layouts.app', [
    'title' => 'Anggota',
    'pageTitle' => 'Daftar Anggota',
])

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Daftar Anggota</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Induk</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $ang)
                            <tr>
                                <td>{{ $ang->id_anggota }}</td>
                                <td>{{ $ang->nama_anggota }}</td>
                                <td>{{ $ang->user->email }}</td>
                                <td>{{ $ang->nomor_induk }}</td>
                                <td>{{ \Carbon\Carbon::parse($ang->tgl_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $ang->jk == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $ang->alamat }}</td>
                                <td>{{ $ang->user->role ?? 'Tidak Ada Role' }}</td>
                                <td>
                                    <form action="{{ route('admin.anggota.destroy', $ang->id_anggota) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.anggota.edit', $ang->id_anggota) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@extends('layouts.app', [
    'title' => 'Admin',
    'pageTitle' => 'Daftar Admin',
])

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary">Tambah Admin</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Daftar Admin</h5>
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
                        @foreach ($admin as $adm)
                            <tr>
                                <td>{{ $adm->id_admin }}</td>
                                <td>{{ $adm->nama_anggota }}</td>
                                <td>{{ $adm->user->email }}</td>
                                <td>{{ $adm->nomor_induk }}</td>
                                <td>{{ \Carbon\Carbon::parse($adm->tgl_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $adm->jk == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $adm->alamat }}</td>
                                <td>{{ $adm->user->role ?? 'Tidak Ada Role' }}</td>
                                <td>
                                    <form action="{{ route('admin.accounts.destroy', $adm->id_admin) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.accounts.edit', $adm->id_admin) }}"
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

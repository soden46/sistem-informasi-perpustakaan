@extends('layouts.app', [
    'title' => 'Kategori',
    'pageTitle' => 'Daftar Kategori',
])

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Daftar Kategori</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $kat)
                            <tr>
                                <td>{{ $kat->id_kategori }}</td>
                                <td>{{ $kat->nama_kategori }}</td>
                                <td>{!! Str::limit(strip_tags($kat->deskripsi), 50) !!}</td>
                                <td>
                                    <a href="{{ route('admin.kategori.edit', $kat->id_kategori) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <!-- Add delete functionality if needed -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

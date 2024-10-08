@extends('layouts.app', [
    'title' => 'Kategori',
    'pageTitle' => 'Daftar Kategori',
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
                                    <form action="{{ route('admin.kategori.destroy', $kat->id_kategori) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.kategori.edit', $kat->id_kategori) }}"
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

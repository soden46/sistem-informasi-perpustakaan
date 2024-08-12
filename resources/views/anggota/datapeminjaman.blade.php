@extends('layouts.app', [
    'title' => 'Daftar Peminjaman Buku',
    'pageTitle' => 'Daftar Peminjaman Buku',
])
@php
    use Carbon\Carbon;
@endphp
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Daftar Peminjaman Buku</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Peminjaman</th>
                            <th>ID Anggota</th>
                            <th>ID Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $pinjam)
                            <tr>
                                <td>{{ $pinjam->id_peminjaman }}</td>
                                <td>{{ $pinjam->id_anggota }}</td>
                                <td>{{ $pinjam->id_buku }}</td>
                                <td>{{ Carbon::parse($pinjam->tgl_pinjam)->format('d/m/Y') }}</td>
                                <td>{{ Carbon::parse($pinjam->tgl_kembali)->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@extends('layouts.app', [
    'title' => 'Dashboard',
    'pageTitle' => 'Dashboard',
])
@section('content')
    <div class="row">
        @if (session()->has('loginSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('loginSuccess') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <style>
            .mainMenu:hover {
                background-color: gainsboro;
            }
        </style>
        <!-- Existing Cards -->
        <div class="col-md-3 mb-4">
            <div class="card d-inline-flex mainMenu"
                style="width: 100%; padding: 12px; border-left: 5px solid indigo; margin-bottom: 20px;">
                <a href="" style="text-decoration: none; color: black;">
                    <div class="d-flex">
                        <div style="width: 100%;">
                            <h6 style="color: indigo;">Jumlah Anggota</h6>
                            <h4>{!! $jumlahAnggota !!}</h4>
                        </div>
                        <div style="width: auto;">
                            <h1><span style="color: black; vertical-align: middle;" class="bi bi-people"></span></h1>
                        </div>
                    </div>
                    <div class="card-footer border bg-transparent" style="width: 100%;">View Details</div>
                </a>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card d-inline-flex mainMenu"
                style="width: 100%; padding: 12px; border-left: 5px solid #1746a2; margin-bottom: 20px;">
                <a href="" style="text-decoration: none; color: black;">
                    <div class="d-flex">
                        <div style="width: 100%;">
                            <h6 style="color: #1746a2;">Jumlah Koleksi buku</h6>
                            <h4>{!! $jumlahKoleksi !!}</h4>
                        </div>
                        <div style="width: auto;">
                            <h1><span style="color: black; vertical-align: middle;" class="bi bi-file-earmark-text"></span>
                            </h1>
                        </div>
                    </div>
                    <div class="card-footer border bg-transparent" style="width: 100%;">View Details</div>
                </a>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card d-inline-flex mainMenu"
                style="width: 100%; padding: 12px; border-left: 5px solid #1746a2; margin-bottom: 20px;">
                <a href="" style="text-decoration: none; color: black;">
                    <div class="d-flex">
                        <div style="width: 100%;">
                            <h6 style="color: #1746a2;">Jumlah Peminjaman</h6>
                            <h4>{!! $jumlahPeminjaman !!}</h4>
                        </div>
                        <div style="width: auto;">
                            <h1><span style="color: black; vertical-align: middle;" class="bi bi-file-earmark-text"></span>
                            </h1>
                        </div>
                    </div>
                    <div class="card-footer border bg-transparent" style="width: 100%;">View Details</div>
                </a>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card d-inline-flex mainMenu"
                style="width: 100%; padding: 12px; border-left: 5px solid #1746a2; margin-bottom: 20px;">
                <a href="" style="text-decoration: none; color: black;">
                    <div class="d-flex">
                        <div style="width: 100%;">
                            <h6 style="color: #1746a2;">Jumlah Pengembalian</h6>
                            <h4>{!! $jumlahPengembalian !!}</h4>
                        </div>
                        <div style="width: auto;">
                            <h1><span style="color: black; vertical-align: middle;" class="bi bi-file-earmark-text"></span>
                            </h1>
                        </div>
                    </div>
                    <div class="card-footer border bg-transparent" style="width: 100%;">View Details</div>
                </a>
            </div>
        </div>

        <!-- New Table for Book Recommendations -->
        <!-- New Table for Book Recommendations with Pagination -->
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Rekomendasi Koleksi Buku</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekomendasi as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> <!-- Display the row number -->
                                    <td>{{ $data->judul }}</td> <!-- Replace with the correct field -->
                                    <td>{{ $data->pengarang }}</td> <!-- Replace with the correct field -->
                                    <td>{{ $data->kategori->nama_kategori }}</td> <!-- Replace with the correct field -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $rekomendasi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

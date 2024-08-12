@extends('layouts.app', [
    'title' => 'Dashboard',
    'pageTitle' => 'Dashboard',
])

@section('content')
    <div class="container">
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

                .card {
                    border: 1px solid #ddd;
                    border-radius: .25rem;
                    display: flex;
                    align-items: stretch;
                    /* Make sure the items stretch to fill the card */
                }

                .card-body {
                    display: flex;
                    align-items: center;
                    width: 100%;
                    /* Ensure that card-body takes up the full width */
                }

                .card-body .icon-container {
                    flex: 0 0 4rem;
                    /* Fixed width for the icon container */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-right: 1px solid #ddd;
                }

                .card-body .icon-container i {
                    font-size: 3rem;
                    /* Size of the icon */
                    width: 100%;
                    /* Ensure icon container width is used */
                }

                .card-body .info-container {
                    flex: 1;
                    /* Allow the info-container to take up the remaining space */
                    padding: 1rem;
                }

                .card-title {
                    margin-bottom: .5rem;
                    font-size: 1.25rem;
                }

                .card-text {
                    margin-bottom: .5rem;
                }
            </style>
            <div class="card-header">
                <h5 class="text-black">Koleksi Buku</h5>
            </div>
            <!-- Card Buku -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Kategori</th>
                        <th>ID Buku</th>
                        <th>Judul Buku</th>
                        <th>Stok</th>
                        <th>Jumlah Pinjaman</th>
                        <th>ISBN</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id_kategori }}</td>
                            <td>{{ $book->id_buku }}</td>
                            <td>{{ $book->judul_buku }}</td>
                            <td>{{ $book->stok - $book->dipinjam }}</td>
                            <td>{{ $book->dipinjam }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>
                                <a href="{{ route('anggota.koleksi.buku.form', $book->id_buku) }}"
                                    class="btn btn-primary">Pinjam</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

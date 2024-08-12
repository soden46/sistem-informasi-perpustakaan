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

                .btn-pinjam {
                    margin-top: 1rem;
                }
            </style>
            <div class="card-header">
                <h5 class="text-black">Rekomendasi Koleksi Buku</h5>
            </div>
            <!-- Card Buku -->
            @foreach ($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Bagian Icon Buku di sebelah kanan -->
                            <div class="icon-container">
                                <i class="fas fa-book-open"></i> <!-- Icon buku -->
                            </div>
                            <!-- Bagian Informasi Buku di sebelah kiri -->
                            <div class="info-container">
                                <h5 class="card-title">ID Kategori: {{ $book->id_kategori }}</h5>
                                <p class="card-text">ID Buku: {{ $book->id_buku }}</p>
                                <p class="card-text">Judul Buku: {{ $book->judul_buku }}</p>
                                <p class="card-text">Stok: {{ $book->stok - $book->dipinjam }}</p>
                                <p class="card-text">Jumlah Pinjaman: {{ $book->dipinjam }}</p>
                                <p class="card-text">ISBN: {{ $book->isbn }}</p>
                                <!-- Tombol Pinjam Buku -->
                                <a href="{{ route('anggota.koleksi.buku.form', $book->id_buku) }}"
                                    class="btn btn-primary mt-2">Pinjam Buku</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop

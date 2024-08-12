@extends('layouts.app', [
    'title' => 'Laporan Peminjaman Buku',
    'pageTitle' => 'Laporan Peminjaman Buku',
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
                <div class="d-flex justify-content-between mb-4">
                    <!-- Form Pencarian di Content Start -->
                    <form action="{{ route('admin.laporan.peminjaman') }}" method="GET" class="d-flex align-items-center">
                        <div class="form-group me-2">
                            <label for="bulan" class="form-label sr-only">Bulan</label>
                            <input type="number" name="bulan" id="bulan" value="{{ $bulan }}"
                                placeholder="Bulan" class="form-control" min="1" max="12" required>
                        </div>
                        <div class="form-group me-2">
                            <label for="tahun" class="form-label sr-only">Tahun</label>
                            <input type="number" name="tahun" id="tahun" value="{{ $tahun }}"
                                placeholder="Tahun" class="form-control" min="2000" max="{{ date('Y') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    <!-- Tombol Unduh PDF di Content End -->
                    <a href="{{ route('admin.laporan.peminjaman.pdf', ['bulan' => $bulan, 'tahun' => $tahun]) }}"
                        class="btn btn-success">Unduh PDF</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Daftar Peminjaman Buku Bulan {{ $bulan }} Tahun {{ $tahun }}</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjamans as $index => $peminjaman)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $peminjaman->anggota->nama ?? 'Tidak Diketahui' }}</td>
                                <td>{{ $peminjaman->buku->judul ?? 'Tidak Diketahui' }}</td>
                                <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d-m-Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada peminjaman buku tersedia untuk bulan dan
                                    tahun ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $peminjamans->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

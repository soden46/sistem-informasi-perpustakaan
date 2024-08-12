<ul class="navbar-nav sidebar sidebar-light bg-primary accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3 text-white">Library Management</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @if (auth()->user()->role == 'admin')
        <!-- Dashboard -->
        <li class="nav-item active">
            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt text-white"></i>
                <span class="text-white">Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading text-white">
            Kelola Anggota
        </div>

        <!-- Kelola Anggota -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnggota"
                aria-expanded="true" aria-controls="collapseAnggota">
                <i class="fas fa-users text-white"></i>
                <span class="text-white">Kelola Anggota</span>
            </a>
            <div id="collapseAnggota" class="collapse" aria-labelledby="headingAnggota" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen Anggota:</h6>
                    <a class="collapse-item" href="{{ route('admin.accounts.index') }}">Admin</a>
                    <a class="collapse-item" href="{{ route('admin.anggota.index') }}">Anggota (Siswa dan
                        Guru)</a>
                </div>
            </div>
        </li>

        <!-- Kelola Buku -->
        <div class="sidebar-heading text-white">
            Kelola Buku
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBuku"
                aria-expanded="true" aria-controls="collapseBuku">
                <i class="fas fa-book text-white"></i>
                <span class="text-white">Kelola Buku</span>
            </a>
            <div id="collapseBuku" class="collapse" aria-labelledby="headingBuku" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen Buku:</h6>
                    <a class="collapse-item" href="{{ route('admin.kategori.index') }}">Kategori</a>
                    <a class="collapse-item" href="{{ route('admin.koleksi.index') }}">Koleksi Buku</a>
                </div>
            </div>
        </li>

        <!-- Peminjaman -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.peminjaman.index') }}">
                <i class="fas fa-exchange-alt text-white"></i>
                <span class="text-white">Peminjaman</span>
            </a>
        </li>

        <!-- Pengembalian -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.pengembalian.index') }}">
                <i class="fas fa-undo text-white"></i>
                <span class="text-white">Pengembalian</span>
            </a>
        </li>

        <!-- Laporan -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                aria-expanded="true" aria-controls="collapseLaporan">
                <i class="fas fa-file-alt text-white"></i>
                <span class="text-white">Laporan</span>
            </a>
            <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Laporan:</h6>
                    <a class="collapse-item" href="{{ route('admin.laporan.peminjaman') }}">Peminjaman</a>
                    <a class="collapse-item" href="{{ route('admin.anggota.index') }}">Keanggotaan</a>
                    <a class="collapse-item" href="{{ route('admin.anggota.index') }}">Buku Paling Diminati</a>
                    <a class="collapse-item" href="{{ route('admin.anggota.index') }}">Denda</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @else
        <!-- Dashboard -->
        <li class="nav-item active">
            <a class="nav-link " href="{{ route('anggota.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt text-white"></i>
                <span class="text-white">Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        </li>

        <!-- Peminjaman -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('anggota.koleksi') }}">
                <i class="fas fa-exchange-alt text-white"></i>
                <span class="text-white">Koleksi Buku</span>
            </a>
        </li>

        <!-- Pengembalian -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('anggota.peminjaman') }}">
                <i class="fas fa-undo text-white"></i>
                <span class="text-white">Peminjaman</span>
            </a>
        </li>

        <!-- Pengembalian -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('anggota.dashboard') }}">
                <i class="fas fa-undo text-white"></i>
                <span class="text-white">Pengembalian</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

</ul>

@extends('layouts.login')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="wrapper bg-white p-4 rounded shadow-lg">
                    <div class="h2 text-center">Login</div>
                    <div class="h4 text-muted text-center pt-2">Sistem Informasi Perpustakaan SMA Negeri 2 Manokwari</div>
                    <div class="d-flex justify-content-around pt-3">
                        <!-- Admin Login Button -->
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Admin Login</h5>
                                <a href="{{ route('login.admin') }}" class="btn btn-primary">Login as Admin</a>
                            </div>
                        </div>

                        <!-- Anggota Login -->
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Anggota Login</h5>
                                <select class="form-select" id="anggotaSelect">
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="{{ route('login.guru') }}">Login as Guru</option>
                                    <option value="{{ route('login.siswa') }}">Login as Siswa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- JavaScript to redirect based on selection -->
                    <script>
                        document.getElementById('anggotaSelect').addEventListener('change', function() {
                            window.location.href = this.value;
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection

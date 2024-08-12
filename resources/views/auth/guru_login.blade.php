@extends('layouts.loginUser')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="h2 text-center">Login</h2>
                <h4 class="h4 text-muted text-center pt-2">Guru</h4>
                <form action="{{ route('login.post') }}" method="post" class="pt-3">
                    @csrf
                    <div class="form-group py-2">
                        <div class="input-field">
                            <span class="far fa-user p-2"></span>
                            <input type="email" name="email" placeholder="Email Address" required
                                class="form-control" />
                        </div>
                    </div>
                    <div class="form-group py-1 pb-2">
                        <div class="input-field position-relative">
                            <span class="fas fa-lock p-2"></span>
                            <input type="password" id="passwordInput" name="password" placeholder="Enter your Password"
                                required class="form-control" />
                            <button type="button"
                                class="btn bg-white text-muted position-absolute end-0 top-50 translate-middle-y"
                                id="togglePassword">
                                <span class="far fa-eye-slash"></span>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="remember">
                            <label class="option text-muted">
                                Remember me <input type="checkbox" name="remember" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="ml-auto">
                            <a href="#" id="forgot">Forgot Password?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block text-center my-3">Log in</button>
                    <div class="text-center pt-3 text-muted">
                        Not a member? <a href="#">Sign up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
